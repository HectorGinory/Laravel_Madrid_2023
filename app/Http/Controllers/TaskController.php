<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function getTasks()
    {
        return [
            "success" => true,
            "message" => "Get tasks retrieved successfully",
            "data" => []
        ];
    }

    public function createTask(Request $request)
    {
        try {
            $title = $request->input('title');
            $description = $request->input('description');
            $userId = $request->input('user_id');

            // insert using query builder
            $task = DB::table('tasks')->insert([
                'title' => $title,
                'description' => $request->input('description'),
                'user_id' => $userId
            ]);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Create task successfully",
                    "data" => $task
                ],
                201
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Cant create task",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function updateTaskById($id)
    {
        return [
            "success" => true,
            "message" => "Update task successfully with id: " . $id,
        ];
    }

    public function deleteTaskById($id)
    {
        return [
            "success" => true,
            "message" => "Delete task successfully with id: " . $id,
        ];
    }
}
