/*
    TODO: reuse in forms
    https://laravelcollective.com/docs/5.2/html#custom-components
*/

// components/form/text.blade.php
<div class="form-group">
    {{ Form::label(ucfirst($name), null, array_merge(['class' => 'control-label'], $labelAttributes)) }}
    <div class="{{ $inputColSize }}">
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
</div>

// Usage in forms
{{ Form::bsText('questions', null, [], [], 'col-xs-9') }}

// app/providers/appserviceprovider.php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('formtext', 'components.form.text', ['name', 'value', 'attributes', 'labelAttributes', 'inputColSize' => null]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}