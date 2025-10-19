<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    //
    public function index(Request $request) 
    {
        

        $query = Contact::query();

        if($request->filled('keyword')) {
            $query->where(function($q) use ($request) {
          $q->where('first_name', 'like',"%{$request->keyword}%")
          ->orWhere('last_name', 'like', "%{$request->keyword}%")
          ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$request->keyword}%"])
          ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if($request->filled('email')){
            $query->where('email','like',"%{$request->email}%");
        }

        if($request->filled('gender')) {
            $query->where('gender',$request->gender);
        }

        if($request->filled('category_id')) {
            $query->where('category_id',$request->category_id);
        }

        if($request->filled("created_at")) {
            $query->whereDate('created_at',$request->date);
        }
// エクスポート
         if ($request->has('export')) {
        $contents = $query->get();

        $csvHeader = ['名前', '性別', 'メールアドレス', 'お問い合わせの種類', '作成日'];
        $csvData = $contents->map(function($contact) {
            return [
                $contact->last_name . ' ' . $contact->first_name,
                $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                $contact->email,
                match ($contact->category_id) {
                    1 => '商品のお問い合わせ',
                    2 => '商品の交換について',
                    3=>'商品トラブル',
                    4=>'ショップへのお問い合わせ',
                    5 => 'その他',
                    default => '不明',
                },
                $contact->created_at->format('Y/m/d'),
            ];
        });

        $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';
        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, $csvHeader);
        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }
        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

         $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename={$filename}");
    }


        $contents =$query->paginate(7);

        return view('admin',compact('contents'));
    }

    public function show($id)
    {
        $content=Contact::findOrFail($id);
        return view('admin_show',compact('content'));
    }

     public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', '削除しました');
    }
}
