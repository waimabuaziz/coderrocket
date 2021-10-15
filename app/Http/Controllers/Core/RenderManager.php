<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RenderManager extends Controller
{

    public function Main_Render(Request $request)
    {

        $render_name = $request->sys_render_name;
        $page_name = $request->sys_page_name;

        $classname = $render_name;
        $usepath = app("App\Http\Controllers\Pages\\{$page_name}\\renders\\{$classname}");
        $Render = new $usepath;
        $MyRender = new $Render;

        try {
            $ret = $MyRender->main($request);      
            $render_path = 'pages.' . $page_name . '.renders.' . $render_name;
              $retarr = $ret[0];
              $items = $ret[1];
             $content = view($render_path, ['items' => $items, 'retarr' => $retarr])->render();
            return response()->json(['ret' => $content]);

        } catch (Exception $e) {
            // report($e);
            return response()->json(['ret' => 'error e exception']);
        } catch (\Throwable $ex) {
            return response()->json(['ret' => 'called render Ajax is not exist']);
        }

        //  return response()->json(['ret' => 'main ajaxx' ]);
    }

    public function default_render($request)
    {
        $page_name = $request->sys_page_name;
        $render_name = $request->sys_render_name;

        $classname = $render_name;
        $usepath = app("App\Http\Controllers\Pages\\{$page_name}\render\{$classname}");
        $Render = new $usepath;
        $MyRender = new $Render;

        // if a function with render name is exist then redirect ot it else use default render
        if (method_exists($MyRender, $render_name)) {
            return $MyRender->main($request);
        }

        $retarr = array(
            'test_par' => '',
        );
        $par_arr = array('par' => 1); // add pars as required
        $ret = $MyRender->SQL->get_table($page_name, 's_' . $render_name, $par_arr);

        $items = $ret;
        return [$retarr, $items];
    }

// ======= render do ===============================================
    public function render_do(Request $request)
    {
        $render_name = $request->render_name;
        $page_name = $request->page_name;

        try {
            $ret = $this->default_render($request);

            $render_path = 'pages.' . $page_name . '.render.' . $render_name;
            $retarr = $ret[0];
            $items = $ret[1];
            $content = view($render_path, ['items' => $items, 'retarr' => $retarr])->render();
            return response()->json(['ret' => $content]);

        } catch (Exception $e) {
            // report($e);
            return response()->json(['ret' => 'error' . $e]);
        } catch (\Throwable $ex) {
            return response()->json(['ret' => 'check the called ajax if exists => ' . $render_name . ' if exists check your logic errors' . $ex]);
        }

    }

}