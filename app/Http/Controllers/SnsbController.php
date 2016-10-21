<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Snsb;
use App\Tocsv;
use DB;

class SnsbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nims = Snsb::groupBy('nim')->get();
        foreach ($nims as $nim) {
            echo $nim = $nim->nim;
            //cek apakah nim sudah ada di csv
            $ceknim = DB::table('to_csv')->where('nim', '=', $nim)->count();
            if($ceknim=='0') {
                    Tocsv::create([
                                'nim'    => $nim,
                            ]);

                    
                    $snsbs = Snsb::where('nim', '=', $nim)->get();
                    $no = 0;
                    foreach ($snsbs as $snsb) {                
                        echo "<br>";
                        echo $no++." | ";
                        $nomortes   = $snsb->nomortes;
                        $jalurmasuk = $snsb->jalurmasuk;

                        if($jalurmasuk=='SNMPTN') {
                            echo $nomortes   = substr($snsb->nomortes, 2);
                        }

                        echo " | ";                
                        echo $thakad     = $snsb->thakad;
                        echo " | ";
                        echo $ips        = $snsb->ips;
                        echo " | ";
                        echo $ipk        = $snsb->ipk;
                        echo " | ";

                        DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['nomor' => $nomortes]);

                        if($no=='1'){
                            DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['ips1' => $ips]); 
                            if($ipk!=='0' || !empty($ipk) || $ipk!=='null' ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['ipk' => $ipk]);
                            }
                        } else if($no=='2') {
                            DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['ips2' => $ips]);
                            if($ipk!=='0' || !empty($ipk) || $ipk!=='null' ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['ipk' => $ipk]);
                            }
                        } else if($no=='3') {
                            DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['ips3' => $ips]);
                            if($ipk!=='0' || !empty($ipk) || $ipk!=='null' ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['ipk' => $ipk]);
                            }
                        } else if($no=='4') {
                            DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['ips4' => $ips]);
                            if($ipk!=='0' || !empty($ipk) || $ipk!=='null' ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['ipk' => $ipk]);
                            }
                        } else if($no=='5') {
                            DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['ips5' => $ips]);
                            if($ipk!=='0' || !empty($ipk) || $ipk!=='null' ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['ipk' => $ipk]);
                            }
                        } else if($no=='6') {
                            DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['ips6' => $ips]);
                            if($ipk!=='0' || !empty($ipk) || $ipk!=='null' ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['ipk' => $ipk]);
                            }
                        } else if($no=='7') {
                            DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['ips7' => $ips]);
                            if($ipk!=='0' || !empty($ipk) || $ipk!=='null' ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['ipk' => $ipk]);
                            }
                        } else if($no=='8') {
                            DB::table('to_csv')
                                ->where('nim', $nim)
                                ->update(['ips8' => $ips]);
                            if($ipk!=='0' || !empty($ipk) || $ipk!=='null' ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['ipk' => $ipk]);
                            }
                        }

                        // $users = DB::table('users')->select('name', 'email as user_email')->get();
                        $ipks = Tocsv::where('nim', '=', $nim)->get();
                        foreach ($ipks as $ipk) {
                             $ips1  = $ipk->ips1;
                             $ips2  = $ipk->ips2;
                             $ips3  = $ipk->ips3;
                             $ips4  = $ipk->ips4;
                             $ips5  = $ipk->ips5;
                             $ips6  = $ipk->ips6;
                             $ips7  = $ipk->ips7;
                             $ips8  = $ipk->ips8;
                             if( ($ips1=='0' || empty($ips1) || $ips1=='null') && ($ips2=='0' || empty($ips2) || $ips2=='null') && ($ips3=='0' || empty($ips3) || $ips3=='null') && ($ips4=='0' || empty($ips4) || $ips4=='null') && ($ips5=='0' || empty($ips5) || $ips5=='null') && ($ips6=='0' || empty($ips6) || $ips6=='null') && ($ips7=='0' || empty($ips7) || $ips7=='null') && ($ips8=='0' || empty($ips8) || $ips8=='null') ) {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['status'       => 'non aktif',
                                              'daftar_ulang' => '0'
                                              ]);
                             } else {
                                DB::table('to_csv')
                                    ->where('nim', $nim)
                                    ->update(['status'       => 'aktif',
                                              'daftar_ulang' => '1'
                                              ]);
                             }
                         }                     

                    }
                    echo "<br><br>";
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    }
}
