<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\User;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\Commentions\Filament\Infolists\Components\CommentsEntry;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextEntry::make('title'),
                TextEntry::make('body'),
                ImageEntry::make('file')
                    ->disk('public')
                    ->visibility('public'),

                Section::make('Comments')
                    ->components([
                        CommentsEntry::make('comments')->mentionables(fn(Model $record) => User::all()),
                    ]),
            ]);
    }
}
