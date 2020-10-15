<?php

namespace App\Http\Controllers;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;

class ArticleController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index(Request $request) {



       if ($request->players === 'プレミアリーグ') {
         $articles = Article::where('players', $request->players)->orderBy('created_at','desc')->paginate(5);
     }elseif($request->players === 'ラ・リーガ') {
          $articles = Article::where('players', $request->players)->orderBy('created_at','desc')->paginate(5);
      }elseif($request->players === 'セリエA') {
           $articles = Article::where('players', $request->players)->orderBy('created_at','desc')->paginate(5);
      }elseif($request->players === '日本代表') {
           $articles = Article::where('players', $request->players)->orderBy('created_at','desc')->paginate(5);
       } elseif($request->players === 'その他') {
            $articles = Article::where('players', $request->players)->orderBy('created_at','desc')->paginate(5);
       }
      else {
          $articles = Article::all()->sortByDesc('created_at');
      }

        return view('posts.index',['articles'=> $articles]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(ArticleRequest $request) //-- ArticleクラスのDIを行わない
{
    $article = new Article(); //-- storeアクションメソッド内でArticleクラスのインスタンスを生成している

    //-- 以降の処理は同じ
    $article->players = $request->players;
    $article->title = $request->title;
    $article->body = $request->body;
    $article->user_id = $request->user()->id;
    $article->save();
    return redirect()->route('article.index');
}




    public function update(ArticleRequest $request,Article $article) {
        $article->fill($request->all())->save();
        return redirect()->route('article.index');
    }



    public function destroy(Article $article) {
        $article->delete();
        return redirect()->route('article.index');
    }


    public function edit(Article $article)
   {
       return view('posts.edit',['article' => $article]);
   }

   public function like(Request $request,Article $article) {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id'=>$article->id,
            'countLikes'=>$article->count_likes,
        ];
   }

   public function unlike(Request $request,Article $article) {
        $article->likes()->detach($request->user()->id);


        return [
            'id'=>$article->id,
            'countLikes'=>$article->count_likes,
        ];
   }
}
