<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Skills;
use DB;


class SkillsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function skills()
    {
        return view('skills.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skills::orderBy('created_at','desc')->paginate(10);
//        $skills = Skills::all();
        return view('skills.index')->with('skills', $skills);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
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
            'skill_name' => 'required'

        ]);

        // Create Skill
        $skill = new Skills;
        $skill->skill_name = $request->input('skill_name');
//      $skill->user_id = auth()->user()->id;
        $skill->save();
        return redirect('/skills')->with('success', 'Skill Created');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = Skills::find($id);
        return view('skills.show')->with('skill', $skill);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skills::find($id);
        // Check for correct user
//        if(auth()->user()->id !==$skill->user_id){
//            return redirect('/skills')->with('error', 'Unauthorized Page');
//        }
        return view('skills.edit')->with('skill', $skill);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create Skill
        $skill = new Skills;
        $skill->skill_name = $request->input('skill_name');

        $skill->save();
        return redirect('/skills')->with('success', 'Skill Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skills::find($id);
        // Check for correct user
//        if(auth()->user()->id !==$skill->user_id){
//            return redirect('/posts')->with('error', 'Unauthorized Page');
//        }
//        if($skill->cover_image != 'noimage.jpg'){
//            // Delete Image
//            Storage::delete('public/cover_images/'.v->cover_image);
//        }

        $skill->delete();
        return redirect('/skills')->with('success', 'Skill Removed');
    }

    public static function skills_count(){
        $counts = skills::count();
        print($counts);
    }
}