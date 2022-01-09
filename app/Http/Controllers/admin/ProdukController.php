<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\produk;
use App\type;
use App\keranjang;
use Redirect;
use Auth;
use DB;

class ProdukController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function listProduk($id){
        $myproduk = produk::where('id_pemilik',Auth::user()->id)->get();
        $type = type::all();
        return view('admin.listproduk')->with([
            'myProduk' => $myproduk,
            'type' => $type
        ]);
    }

    public function laporan($id){
        $myproduk = produk::where('id_pemilik',Auth::user()->id)->where('jumlah_terjual','!=','NULL')->get();
        $type = type::all();
        return view('supplier.laporan')->with([
            'myProduk' => $myproduk,
            'type' => $type
        ]);
    }

    public function editproduk($id){
        $produk = produk::where('id',$id)->first();
        $type = type::all();
        return view('admin.editproduk')->with([
            'produk' => $produk,
            'type' => $type
        ]);
    }

    public function showproduk($id){
        $produk = produk::where('id',$id)->first();
        return view('admin.showproduk')->with([
            'produk' => $produk
        ]);
    }
    
    public function addproduk($id){
        $type = type::all();
        return view('admin.addproduk')->with([
            'type' => $type
        ]);
    }

    public function newProduk(Request $request){
        $add = new produk;

        $this->validate(request(), [
            'nama_produk' => 'unique:produk,nama_produk',
        ]);

        $add->id_pemilik=Auth::user()->id;
        $add->nama_produk=$request->nama_produk;
        $add->desc=$request->desc;
        $add->Quantity=$request->jumlah;
        $add->harga=$request->harga;
        $add->status=$request->status;
        $add->id_kategori=$request->type;
        
        if($request->filename!=NULL){
            $data          = $request->file('filename');
            $nama          = $data->getClientOriginalName();
            $add->image    = $nama;
            $tujuan_upload = 'data_file';
            $data->move($tujuan_upload,$data->getClientOriginalName());
        }

        $add->save();

        return redirect::back()->with('status', 'Data Produk '.$add->nama_produk.' berhasil Di edit');
    }

    public function editdataproduk(Request $request,$id){
        $add = produk::where('id',$id)->first();
        $add->id_pemilik=Auth::user()->id;
        $add->nama_produk=$request->nama;
        $add->desc=$request->desc;
        $add->Quantity=$request->jumlah;
        $add->harga=$request->harga;
        $add->status=$request->status;
        $add->id_kategori=$request->type;
        
        if($request->filename!=NULL){
            $data          = $request->file('filename');
            $nama          = $data->getClientOriginalName();
            $add->image    = $nama;
            $tujuan_upload = 'data_file';
            $data->move($tujuan_upload,$data->getClientOriginalName());
        }
        $add->save();

        return redirect::route('listProduk',$add->id_pemilik)->with('status', 'Data Produk '.$add->nama_produk.' berhasil Di edit');
    }

    public function detailproduk($id){
        $produk = produk::where('id',$id)->first();
        $cart = keranjang::where('id_produk',$id)->get();
        return view('admin.detailproduk')->with([
            'produk' => $produk,
            'cart' => $cart
        ]);
    }

    public function kategori($id){ // menarik data kategori pangan
        $pangan = DB::table('sub_kategori')->where('id_type',$id)->pluck('subkategori','id_type');
        return json_encode($pangan);
    }

    public function produk($id){ // menarik data kategori pangan
        $pangan = DB::table('produk')->where('id_kategori',$id)->pluck('id','nama_produk');
        return json_encode($pangan);
    }
}
