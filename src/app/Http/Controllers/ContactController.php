<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // フォーム表示
    public function index()
    {
        $categories = Categories::all();
        return view('index', compact('categories'));
    }

    // 確認画面表示
    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        $category = Categories::find($contact['category_id']);
        return view('confirm', compact('contact', 'category'));
    }

    // DB登録処理
    public function store(ContactRequest $request)
    {
        $contact = $request->all();

        if($request->input('action') ==='back') {
            return redirect()->route('contacts.index')->withInput($contact);
        }

        if ($contact['gender'] === '男性') {
            $contact['gender'] = 0;
        } elseif ($contact['gender'] === '女性') {
            $contact['gender'] = 1;
        } else {
            $contact['gender'] = 2;
        }

        
        $contact['tel'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];

        
        unset(
            $contact['tel1'],
            $contact['tel2'],
            $contact['tel3'],
            $contact['_token'],
            $contact['action']
        );

        // --- データ登録 ---
        Contact::create($contact);

        // --- サンクスページへ ---
        return view('thanks');
    }
}
