<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Action;
use App\Http\Resources\ActionResource;

class ActionController extends Controller
{
    public function index() {
        $actions = Action::with('images')->get();
        return ActionResource::collection($actions);
    }
}
