<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommendationController extends Controller
{
    public function index()
    {
        $response = Http::get('http://api.AgroFinanzas.test/api/recommendations');
        
        $recommendations = collect($response->json() ?? [])->map(function ($rec) {
            
            // Convertir fecha del comentario principal
            $rec['created_at'] = \Carbon\Carbon::parse($rec['created_at'])
                ->setTimezone('America/Bogota')
                ->toDateTimeString();

            // Convertir fecha de cada respuesta
            if (!empty($rec['replies'])) {
                $rec['replies'] = array_map(function ($reply) {
                    $reply['created_at'] = \Carbon\Carbon::parse($reply['created_at'])
                        ->setTimezone('America/Bogota')
                        ->toDateTimeString();
                    return $reply;
                }, $rec['replies']);
            }

            return $rec;
        })->toArray();

        return view('recommendations.index', compact('recommendations'));
    }

    public function store(Request $request)
    {
        $user = session('user');

        $request->validate([
            'text'       => 'required|string',
            'category'   => 'required|string',
            'media_file' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480',
        ], [
            'text.required'    => 'El texto es obligatorio.',
            'media_file.mimes' => 'Solo se permiten imágenes (jpg, png, gif) y videos (mp4, mov, avi).',
            'media_file.max'   => 'El archivo no puede superar 20MB.',
        ]);

        $http = Http::asMultipart();

        if ($request->hasFile('media_file')) {
            $file = $request->file('media_file');
            $http = $http->attach(
                'media_file',
                fopen($file->getRealPath(), 'r'),
                $file->getClientOriginalName()
            );
        }

        $fields = [
            ['name' => 'text',     'contents' => $request->text],
            ['name' => 'category', 'contents' => $request->category],
            ['name' => 'user_id',  'contents' => (string) ($user['id'] ?? '')],
        ];

        if ($request->parent_id) {
            $fields[] = ['name' => 'parent_id', 'contents' => (string) $request->parent_id];
        }

        $http->post('http://api.AgroFinanzas.test/api/recommendations', $fields);

        return redirect()->route('recommendations.index');
    }
}