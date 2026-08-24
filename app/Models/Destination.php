<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Destination
{
    protected static string $path = 'database/data/destinos.json';

    /**
     * Obtiene todos los destinos turísticos del JSON.
     */
    public static function all(): array
    {
        $fullPath = base_path(self::$path);

        if (!File::exists($fullPath)) {
            return [];
        }

        $json = File::get($fullPath);
        return json_decode($json, true) ?? [];
    }

    /**
     * Busca un destino específico por su ID.
     */
    public static function find(int $id): ?array
    {
        $destinations = self::all();

        foreach ($destinations as $destination) {
            if ($destination['id'] === $id) {
                return $destination;
            }
        }

        return null;
    }
}