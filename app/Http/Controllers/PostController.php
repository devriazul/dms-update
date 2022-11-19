<?php

namespace App\Http\Controllers;

use App\Post;
use App\Contact;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\contactMail;
use Illuminate\Support\Facades\Mail;
use App\BlogCategory;
use App\Course;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        if ($request->bulk_action_btn === 'update_status'){
            Post::query()->whereIn('id', $request->bulk_ids)->update(['status' => $request->status]);
            return back()->with('success', __a('bulk_action_success'));
        }
        if ($request->bulk_action_btn === 'delete'){
            if(config('app.is_demo')) return back()->with('error', __a('demo_restriction'));

            Post::query()->whereIn('id', $request->bulk_ids)->delete();
            return back()->with('success', __a('bulk_action_success'));
        }

        $title = __a('pages');
        $posts = Post::whereType('page')->orderBy('id', 'desc')->paginate(20);
        return view('admin.cms.pages', compact('title', 'posts'));
    }

    public function posts(Request $request){
        if ($request->bulk_action_btn === 'update_status'){
            Post::query()->whereIn('id', $request->bulk_ids)->update(['status' => $request->status]);
            return back()->with('success', __a('bulk_action_success'));
        }
        if ($request->bulk_action_btn === 'delete'){
            if(config('app.is_demo')) return back()->with('error', __a('demo_restriction'));

            Post::query()->whereIn('id', $request->bulk_ids)->delete();
            return back()->with('success', __a('bulk_action_success'));
        }

        $title = __a('posts');
        $posts = Post::whereType('post')->orderBy('id', 'desc')->paginate(20);

        return view('admin.cms.posts', compact('title', 'posts'));
    }

    public function createPost(){
        $title = __a('create_new_post');
        $categories = BlogCategory::where('status',0)->where('is_deleted',0)->get();
        return view('admin.cms.post_create', compact('title','categories'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storePost(Request $request){
        if(config('app.is_demo')) return back()->with('error', __a('app.feature_disable_demo'));

        $user = Auth::user();
        $rules = [
            'title'     => 'required|max:220',
            'post_content'   => 'required',
            'blog_category_id'   => 'required',
            'meta_description'   => 'max:156',
        ];
        $this->validate($request, $rules);

        $slug = unique_slug($request->title, 'Post');
        $data = [
            'user_id'               => $user->id,
            'title'                 => clean_html($request->title),
            'tags'                 => clean_html($request->tags),
            'meta_description'      => clean_html($request->meta_description),
            'slug'                  => $slug,
            'post_content'          => clean_html($request->post_content),
            'blog_category_id'      => $request->blog_category_id,
            'type'                  => 'post',
            'status'                => $request->status,
            'feature_image'         => $request->feature_image,
        ];

        $postData = Post::create($data);
        return redirect(route('edit_post',$postData->id))->with('success', __a('post_has_been_created'));
    }


    public function editPost($id){
        $title = __a('edit_post');
        $categories = BlogCategory::where('status',0)->where('is_deleted',0)->get();
        $post = Post::find($id);

        return view('admin.cms.edit_post', compact('title', 'post','categories'));
    }

    public function updatePost(Request $request, $id){
        if(config('app.is_demo')) return back()->with('error', __a('app.feature_disable_demo'));

        $rules = [
            'title'     => 'required|max:220',
            'post_content'   => 'required',
            'meta_description'   => 'max:156',
            'blog_category_id'   => 'required',
        ];
        $this->validate($request, $rules);
        $page = Post::find($id);

        $data = [
            'title'                 => clean_html($request->title),
            'tags'                 => clean_html($request->tags),
            'meta_description'      => clean_html($request->meta_description),
            'post_content'          => clean_html($request->post_content),
            'blog_category_id'      => $request->blog_category_id,
            'status'          => clean_html($request->status),
            'feature_image'         => $request->feature_image,
        ];
        $page->update($data);
        return redirect()->back()->with('success', __a('post_has_been_updated'));
        
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $title = __a('pages');
        return view('admin.cms.page_create', compact('title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        if(config('app.is_demo')) return back()->with('error', __a('app.feature_disable_demo'));

        $user = Auth::user();
        $rules = [
            'title'     => 'required|max:220',
            'post_content'   => 'required',
        ];
        $this->validate($request, $rules);

        $slug = unique_slug($request->title, 'Post');
        $data = [
            'user_id'               => $user->id,
            'title'                 => clean_html($request->title),
            'slug'                  => $slug,
            'post_content'          => clean_html($request->post_content),
            'type'                  => 'page',
            'status'                => 1,
        ];

        Post::create($data);
        return redirect(route('pages'))->with('success', __a('page_has_been_created'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $title = __a('edit_page');
        $post = Post::find($id);
        return view('admin.cms.edit_page', compact('title', 'post'));
    }

    public function updatePage(Request $request, $id){
        if(config('app.is_demo')) return back()->with('error', __a('app.feature_disable_demo'));

        $rules = [
            'title'     => 'required|max:220',
            'post_content'   => 'required',
        ];
        $this->validate($request, $rules);
        $page = Post::find($id);

        $data = [
            'title'                 => clean_html($request->title),
            'post_content'          => clean_html($request->post_content),
        ];

        $page->update($data);
        return redirect()->back()->with('success', __a('page_has_been_updated'));
    }

    public function showPage($slug){
        $page = Post::whereSlug($slug)->first();

        if (! $page){
            return view('theme.error_404');
        }
        $title = $page->title;
        return view('theme.single_page', compact('title', 'page'));
    }

    public function blog($slug=NULL){
        $title = '';
        if($slug){
            
            $category = BlogCategory::where('slug',$slug)->first();
            $title = 'Blog Filter By '.$category->title;
            $posts = Post::where('blog_category_id',$category->id)->post()->publish()->paginate(20);
        }else{
            $title = 'Blog';
            $posts = Post::post()->publish()->paginate(20);
        }
        return view(theme('blog'), compact('title', 'posts'));
    }
    //search blog
    public function search_blog($key=NULL){
        $title = 'Search Blog';
        $posts = Post::where('title', 'LIKE', "%{$key}%")->post()->publish()->paginate(20);
        return view(theme('blog'), compact('title', 'posts'));
    }

    public function authorPosts($id){
        $posts = Post::whereType('post')->whereUserId($id)->paginate(20);
        $user = User::find($id);
        $title = $user->name."'s ".trans('app.blog');
        return view('theme.blog', compact('title', 'posts'));
    }

    public function postSingle($slug){
        $post = Post::whereSlug($slug)->first();
        if ( ! $post){
            return redirect('blog');
        }
        $title = $post->title;
        $categories = BlogCategory::where('status',0)->where('is_deleted',0)->get();
        if ($post->type === 'post'){
            return view(theme('single_post'), compact('title', 'post','categories'));
        }
        return view(theme('single_page'), compact('title', 'post'));
    }

    public function postProxy($id){
        $post = Post::where('id', $id)->orWhere('slug', $id)->first();
        if ( ! $post){
            abort(404);
        }
        return redirect(route('post', $post->slug));
    }

    public function contactUs(){
        $title = 'Contact Us';
        $countries = Country::all();
        $courses = Course::where('status',1)->get();
        return view(theme('contact'), compact('title','countries','courses'));
    }
    //save contact info
    public function storeContactus(Request $request){
        $rules = [
            'full_name'     => 'required|max:220',
            'email'   => 'required|email',
            'phone'   => 'required',
            'country'   => 'required',
            'contact_reason'   => 'required',
            'message'   => 'required',
        ];
        $this->validate($request, $rules);
        $privacy = '';
        $is_receiving_info = '';
        if($request->has('privacy_policy')){
            $privacy = 1;
        }else{
            $privacy = 0;
        }
        $is_receiving_info = '';
        if($request->has('is_receiving_info')){
            $is_receiving_info = 1;
        }else{
            $is_receiving_info = 0;
        }
        $data = [
            'full_name'             => clean_html($request->full_name),
            'email'                 => clean_html($request->email),
            'phone'                 => clean_html($request->phone),
            'country'               => clean_html($request->country),
            'contact_reason'        => clean_html($request->contact_reason),
            'message'               => clean_html($request->message),
            'datetime'              => time(),
            'type'                  => 1,
            'privacy_policy'        => $privacy,
            'is_receiving_info'     => $is_receiving_info,
        ];
        Contact::create($data);
        Mail::to('aiub.tanvir@gmail.com')->send(new contactMail($data));
        Session::flash('success','Thanks for your query!');
        Session::flash('contact_success','Thanks To Connecting with us! We will contact to you very soon!');
        return redirect()->back();
    }
    //get contact list for admin 
    public function getContactList(){
        $title = 'Contatc List';
        $contacts = Contact::where('is_deleted',0)->orderBy('id','desc')->paginate(15);
        return view('admin.cms.contact_list', compact('title', 'contacts'));
    }
    //is viewed contact 
    public function isViewedContact($id=NULL){
        $contact = Contact::find($id);
        if(!$contact){
            abort(404);
        }
        $update = Contact::where('id',$contact->id)->update(['status'=>1]);
        Session::flash('success','Successfully Viewed This Query!');
        return redirect(route('getContactList'));
    }
    //delete contact 
    public function deleteContact($id=NULL){
        $contact = Contact::find($id);
        if(!$contact){
            abort(404);
        }
        $update = Contact::where('id',$contact->id)->update(['is_deleted'=>1]);
        Session::flash('success','Successfully Deleted This Query!');
        return redirect(route('getContactList'));
    }
    //get phone by country \
    public function getPhoneCodeByCountry($country_name=NULL){
        if(!$country_name){
            $data['result'] = array(
                'key'=>101,
                'val'=>'Country Name Not Found!'
            );
            return response()->json($data,200);
        }
        $getCountry = Country::where('name',$country_name)->first();
        if(!$getCountry){
            $data['result'] = array(
                'key'=>101,
                'val'=>'Country Data Not Found!'
            );
            return response()->json($data,200);
        }
        $data['result'] = array(
            'key'=>200,
            'val'=>$getCountry->calling_code
        );
        return response()->json($data,200);

    }
    public function getPhoneCodeByCountryId($country_id=NULL){
        if(!$country_id){
            $data['result'] = array(
                'key'=>101,
                'val'=>'Country Id Not Found!'
            );
            return response()->json($data,200);
        }
        $getCountry = Country::where('id',$country_id)->first();
        if(!$getCountry){
            $data['result'] = array(
                'key'=>101,
                'val'=>'Country Data Not Found!'
            );
            return response()->json($data,200);
        }
        $data['result'] = array(
            'key'=>200,
            'val'=>$getCountry->calling_code
        );
        return response()->json($data,200);

    }

    public function aboutUs(){
        
        $title = 'About Us';

        return view(theme('about'), compact('title'));
    }

    public function ourTeam(){
        
        $title = 'Our Team';

        return view(theme('team'), compact('title'));
    }
    
    //serach post by category or title 
    public function search_post_by_category($category_id=NULL){
        if(!$category_id){
            return redirect(route('blog'));
        }

    }
    public function helpSupport(){
        
        $title = 'Help & Support';
        $countries = Country::all();
        $courses = Course::where('status',1)->get();
        return view(theme('help'), compact('title','countries','courses'));
    }
    public function sitemap(){
        
        return response()->view(theme('sitemap'))->header('Content-Type', 'text/xml');
    }

}
