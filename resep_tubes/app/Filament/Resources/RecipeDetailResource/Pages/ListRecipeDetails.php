<?php

namespace App\Filament\Resources\RecipeDetailResource\Pages;

use App\Filament\Resources\RecipeDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecipeDetails extends ListRecords
{
    protected static string $resource = RecipeDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
