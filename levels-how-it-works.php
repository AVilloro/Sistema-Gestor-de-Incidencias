s<?php

// Incidencias asignadas a mí
Incident::where('project_id', 1)->where('support_id', auth()->user()->id)->get()

$projectUser = ProjectUser::where('project_id', 1)
	->where('user_id', auth()->user()->id)->first();

$projectUser->level_id

// Incidencias sin asignar
Incident::where('support_id', null)
->where('level_id', $projectUser->level_id)->get()

// Incidencias reportadas por mí
Incident::where('client_id', auth()->user()->id)
	->where('project_id', 1)

ProyectoA: N1, N2, N3

ProyectoA, N2
