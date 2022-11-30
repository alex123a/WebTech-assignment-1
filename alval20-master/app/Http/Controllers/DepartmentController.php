<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller {
    private function getDepartments() {
        $departments = Department::all();
        $departments2 = array();
        foreach($departments as $department) {
            $numberOfCourses = count(Course::where("department_id", $department["id"])->get());
            $department["numOfCourses"] = $numberOfCourses;
            array_push($departments2, $department);
        }
        return $departments2;
    }

    public function index() {
        $departments2 = $this->getDepartments();
        $message = session()->get("message");
        session()->put("message", "");
        return view("dep.index", ["departments" => $departments2, "message" => $message]);
    }

    public function create() {
        return view("dep.create");
    }

    public function store() {
        $department = new Department();
        request()->validate(["name" => "required|max:120|unique:departments,name",
        "code" => "required|max:200|unique:departments,code"]);
        $department->name = request("name");
        $department->code = request("code");
        $department->description = request("description");
        $department->save();
        session()->put("message", "Department " .request("code"). " created successfully.");
        $departments2 = $this->getDepartments();
        return redirect()->route("dep.index");
    }

    public function show($department) {
        $department2 = Department::find($department);
        $courses = Course::where("department_id", $department)->get();
        $message = session()->get("message");
        session()->put("message", "");
        return view("dep.show", ["department" => $department2, "courses" => $courses, "message" => $message]);
    }

    public function edit($department) {
        $department2 = Department::find($department);
        return view("dep.edit", ["department" => $department2]);
    }

    public function update($department) {
        $department = Department::find($department);
        if ($department->name != request("name")) {
            request()->validate(["name" => "required|max:120|unique:departments,name"]);
            $department->name = request("name");
        }
        if ($department->code != request("code")) {
            request()->validate(["code" => "required|max:200|unique:departments,code"]);
            $department->code = request("code");
        }
        $department->description = request("description");
        $department->save();
        $courses = Course::where("department_id", $department)->get();
        session()->put("message", "Department ".request("code")." updated successfully");
        return view("dep.show", ["department" => $department, "courses" => $courses, "message" => session()->get("message")]);
    }

    public function delete($department) {
        $department = Department::find($department);
        $code = $department["code"];
        $department->delete();
        session()->put("message", "Department " .$code. " successfully removed.");
        $departments2 = $this->getDepartments();
        return redirect()->route("dep.index");
    }
}
