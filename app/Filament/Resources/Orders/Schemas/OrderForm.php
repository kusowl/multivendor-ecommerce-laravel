<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\Payment\PaymentMethod;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->disabled(),
                TextInput::make('order_no')
                    ->required()
                    ->disabled(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('sub_total')
                    ->required()
                    ->numeric(),
                TextInput::make('shipping_fee')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('payment_status')
                    ->required()
                    ->default('unpaid'),
                Select::make('payment_method')
                    ->options(PaymentMethod::toArray())
                    ->required(),
                DatePicker::make('confirmed_at'),
                DatePicker::make('shipped_at'),
                DatePicker::make('delivered_at'),
                DatePicker::make('cancelled_at'),
                DatePicker::make('returned_at'),
            ]);
    }
}
