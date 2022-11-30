<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;


class CoursesController extends Controller {
    private function getCourses() {
        $courses = Course::all();
        $courses2 = array();
        foreach($courses as $course) {
            $department = Department::find($course["department_id"]);
            $course["department_name"] = $department["name"];
            array_push($courses2, $course);
        }
        return $courses2;
    }
    public function index() {
        $message = session()->get("message");
        $courses = $this->getCourses();
        session()->put("message", "");
        return view("course.index", ["courses" => $courses, "message" => $message]);
    }

    public function create() {
        $departments = Department::all();
        return view("course.create", ["departments" => $departments]);
    }
    
    public function store() {
        $course = new Course();
        $department = Department::find(request("department"));
        request()->validate(["name" => "required|max:120",
        "code" => "required|max:200", "ects" => "required|numeric|between:0,30"]);
        $course->name = request("name");
        $course->code = request("code");
        $course->ects = request("ects");
        $course->department()->associate($department);
        $course->description = request("description");
        $course->save();
        session()->put("message", "Course " .request("code"). " created successfully.");
        return redirect()->route("course.index");
    }

    public function show($course) {
        $course = Course::find($course);
        $department = Department::find($course["department_id"]);
        $message = "";
        session()->put("message", "");
        return view("course.show", ["course" => $course, "department" => $department, "message" => $message]);
    }

    public function edit($course) {
        $course = Course::find($course);
        $departments = Department::all();
        return view("course.edit", ["course" => $course, "departments" => $departments]);
    }

    public function update($course) {
        $course = Course::find($course);
        if ($course->name != request("name")) {
            request()->validate(["name" => "required|max:120"]);
            $course->name = request("name");
        }
        
        if ($course->code != request("code")) {
            request()->validate(["code" => "required|max:200"]);
            $course->code = request("code");
        }
        
        if ($course->ects != request("ects")) {
            request()->validate(["ects" => "required|numeric|between:0,30"]);
            $course->ects = request("ects");
        }
        $course->department()->associate(Department::find(request("department")));
        $course->description = request("description");
        $course->save();
        $department = Department::find($course["department_id"]);
        session()->put("message", "Course " .request("code"). " updated successfully.");
        return view("course.show", ["course" => $course, "message" => session()->get("message"), "department" => $department]);
    }

    public function delete($course) {
        $course = course::find($course);
        $code = $course["code"];
        $course->delete();
        session()->put("message", "Course " .$code. " successfully removed.");
        return redirect()->route("course.index");
    }
}
