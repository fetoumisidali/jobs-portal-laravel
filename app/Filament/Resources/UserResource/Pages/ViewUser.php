<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Actions\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Table;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;




    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema(
                [
                    Section::make("user information's")->schema([
                        TextEntry::make("username")->label("user name"),
                        TextEntry::make("email"),
                        TextEntry::make('Posted Jobs')
                            ->state(function (Model $record): int {
                                return $record->jobList()->count();
                            }),
                        TextEntry::make('Applicants')
                            ->state(function (Model $record): int {
                                return $record->applicants()->count();
                            }),
                    ])->columns(2),
                ]
            );
    }
    


    public function getTitle(): string
    {
        return $this->record->username . " info";
    }
}
