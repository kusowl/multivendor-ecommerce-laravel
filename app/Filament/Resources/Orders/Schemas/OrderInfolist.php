<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('order_no'),
                TextEntry::make('total_amount')
                    ->numeric(),
                TextEntry::make('sub_total')
                    ->numeric(),
                TextEntry::make('shipping_fee')
                    ->numeric(),
                TextEntry::make('discount')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('payment_status'),
                TextEntry::make('payment_method'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('confirmed_at')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('shipped_at')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('delivered_at')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('cancelled_at')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('returned_at')
                    ->date()
                    ->placeholder('-'),
            ]);
    }
}
