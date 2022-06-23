<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificaciones;

class NotificacionesController extends Controller
{
    public function index() {
        $notificaciones = Notificaciones::latest()->get();
        return View("admin.notificaciones.index" , compact("notificaciones"));
    }
}
