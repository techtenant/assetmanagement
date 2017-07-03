<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Sentinel;
use PDF;
use App\Http\Controllers\CategoryController;
class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getAllAssets(){
        return Asset::orderBy('id','desc')->get();
    }

    public static function getAvailableAssets(){
        return Asset::where('available',true)->orderBy('id','desc')->get();
    }
    public function index()
    {
        $data = [
            'assets'=>self::getAllAssets()
        ];
        return view('assets.index',$data);
    }

    public function inPossession(){
        $user_id = Sentinel::getUser()->id;
        $resources = AssetUser::where('user_id',$user_id)
            ->where('approved',true)
            ->get();
        return view('users.index')->with('resources',$resources);
    }

    public function streamPdf()
    {
        $resources = self::getAllAssets();
        $pdf = PDF::loadView('assets.to_pdf', ['resources' => $resources]);
        return @$pdf->stream('assets.pdf');
    }


    public function allResources(){
        $data = [
          'resources'=>self::getAvailableAssets(),
        ];
        return view('assets.request',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories'=>CategoryController::getCategories(),
        ];
        return view('assets.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'category' => 'required|max:255',
            'serial_number' => 'required|unique:assets|min:10|max:255',
        ]);

        Asset::firstOrCreate(
            ['name'=>$request->name,'category_id'=>$request->category,'serial_number'=>$request->serial_number],
            ['name'=>$request->name,'category_id'=>$request->category,'serial_number'=>$request->serial_number]

        );
        return  redirect()->route('assets');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resource = Asset::where('serial_number',$id)->first();

        if($resource){
            return view('assets.request_form')->with('resource',$resource);
        }else{
            abort(404);
        }
    }

    public static function getAllReservations(){
        return AssetUser::all();
    }

    public function getReservations(){
        $data = [
            'reservations'=>self::getAllReservations()
        ];
        return view('reservations.index',$data);
    }

    public function reserveResource(Request $request){
        $this->validate($request, [
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        Asset::where('id',$request->id)->update(['available'=>false]);
        AssetUser::create(
            [
                'user_id'=>\Sentinel::getUser()->id,
                'asset_id'=>$request->id,
                'department_id'=>Sentinel::getUser()->department_id,
                'from_date'=>Carbon::parse($request->from_date),
                'to_date'=>Carbon::parse($request->to_date),
            ]
        );
        return redirect()->route('all-resources');
    }

    public function approveRequest($id){
        $reservation = AssetUser::find($id);
        $reservation->approved = true;
        $reservation->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:255',
            'serial_number' => 'required|min:10|max:255|unique:assets,serial_number,'.$asset->id,
        ]);

        $serial_number = $request->serial_number;
        $name = $request->name;
        $asset->name = $name;
        $asset->serial_number = $serial_number;
        $asset->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $asset = Asset::findOrFail($id);
        $asset->delete($id);
        return redirect()->route('assets');
    }
}
