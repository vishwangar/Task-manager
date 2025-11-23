else if(is_array($selectedDepartment) && count($selectedDepartment) > 0){
foreach ($selectedDepartment as $dept) {
Mainbranch::create([
'task_id' => $maintask->task_id,
'assigned_to_id' => $request->selectedDepartments,
'assigned_to_name' => $,
'deadline' => $request->deadline,
]);
}
}
else{
if (is_array($selectedFaculties) && count($selectedFaculties) > 0){
foreach ($selectedDepartment as $dept) {
Mainbranch::create([
'task_id' => $maintask->task_id,
'assigned_to_id' => $request->selectedFaculties,
'assigned_to_name' => $,
'deadline' => $request->deadline,
]);
}
}
}



// Determine faculty based on work type
$faculty = ($workType == 'Management') ? $request->input('researchType') : $request->input('teachingSubject');
$fac1 = $request->input('researchType');
// Check if the faculty record exists
$facultyData = Faculty::where('id', '=', $fac1)->value('name');

// If faculty is not found, return an error
if (!$facultyData) {
return response()->json([
'status' => 404,
'message' => 'Faculty not found',
], 404);
}

Mainbranch::create([
'task_id' => $maintask->task_id,
'assigned_to_id' => $fac1,
'assigned_to_name' => $facultyData,
'deadline' => $request->deadline,
'status' => '0',
]);

return response()->json([
'status' => 200,
]);
}

// Default return if no conditions are met
return response()->json([
'status' => 500,
'message' => 'Invalid task assignment conditions',
], 500);



if ($workType == 'center of head') {
$fac = $request->input('teachingSubject');
$facultyData = Faculty::where('id', '=', $fac)->value('name');
Mainbranch::create([
'task_id' => $maintask->task_id,
'assigned_to_id' => $fac,
'assigned_to_name' => $facultyData,
'deadline' => $request->deadline,
'status' => '0',
]);
return response()->json([
'status' => 200,
]);
}


@elseif($specialStatus == 2 && $Role == 'center of head')
<div class="mb-3">
  <label for="fnewFaculty" class="form-label">Select Faculty</label>
  <button type="button" class="form-control text-start dropdown-toggle" data-bs-toggle="dropdown"
    id="fnewFacultyBtn">Select</button>
  <ul class="dropdown-menu" id="fnewFacultyDropdown">
    @foreach($departmentfaculties as $df)
    <li>
      <label class="dropdown-item">
        <input type="checkbox" class="fdeptfaculty-checkbox" value="{{ $df->id }}"
          onchange="updateSelectedforwarddepartmentFaculties()">
        {{ $df->name }}
      </label>
    </li>
    @endforeach
  </ul>
  <input type="hidden" name="selectedforwarddeptFaculties" id="selectedforwarddeptFaculties">
</div>


@elseif($specialStatus == 2 && $Type == 'center of head')
<div class="mb-3">
  <label for="coordinators" class="form-label">Select Faculty</label>
  <button type="button" class="form-control text-start dropdown-toggle" data-bs-toggle="dropdown"
    id="coordinatorBtn">Select</button>
  <ul class="dropdown-menu" id="coordinatorDropdown">
    @foreach($coordinators as $c)
    <li>
      <label class="dropdown-item">
        <input type="checkbox" class="coordinator-checkbox" value="{{ $c->id }}"
          onchange="updateSelectedcoordinators()">
        {{ $df->name }}
      </label>
    </li>
    @endforeach
  </ul>
  <input type="hidden" name="selecteddeptFaculties" id="selecteddeptFaculties">
</div>