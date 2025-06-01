<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeDetailResource\Pages;
use App\Filament\Resources\RecipeDetailResource\RelationManagers;
use App\Models\RecipeDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Models\Recipe;


class RecipeDetailResource extends Resource
{
    protected static ?string $model = RecipeDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('recipe_id')
                ->label('Recipe')
                ->relationship('recipe', 'title') // Pastikan relasi 'recipe' dan kolom 'title' ada di model Recipe
                ->required(1000),

            Forms\Components\RichEditor::make('ingredient')
                ->label('Ingredient')
                ->required(),

            Forms\Components\RichEditor::make('measurement')
                ->label('Measurement')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
                    ->columns([
            TextColumn::make('recipe.title') // asumsi ada relasi recipe()
                ->label('Recipe'),

            TextColumn::make('ingredient')
                ->label('Ingredient')
                    ->formatStateUsing(function (?string $state) {
        if (!$state) return '-';

        $doc = new \DOMDocument();
        libxml_use_internal_errors(true); // biar gak error kalau HTML nggak valid
        $doc->loadHTML($state);

        $lis = $doc->getElementsByTagName('li');
        $output = '';
        foreach ($lis as $i => $li) {
            $output .= ($i + 1) . '. ' . $li->nodeValue . PHP_EOL;
        }

        return nl2br(trim($output)); // biar enter-nya kebaca jadi <br>
    })
    ->html()
                ->searchable()
                ->sortable(),

            TextColumn::make('measurement')
                ->formatStateUsing(function (?string $state) {
        if (!$state) return '-';

        $doc = new \DOMDocument();
        libxml_use_internal_errors(true); // biar gak error kalau HTML nggak valid
        $doc->loadHTML($state);

        $lis = $doc->getElementsByTagName('li');
        $output = '';
        foreach ($lis as $i => $li) {
            $output .= ($i + 1) . '. ' . $li->nodeValue . PHP_EOL;
        }

        return nl2br(trim($output)); // biar enter-nya kebaca jadi <br>
    })
    ->html()
                ->label('Measurement')
                ->sortable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecipeDetails::route('/'),
            'create' => Pages\CreateRecipeDetail::route('/create'),
            'edit' => Pages\EditRecipeDetail::route('/{record}/edit'),
        ];
    }
}
