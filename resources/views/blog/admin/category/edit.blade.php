<x-app-layout>
    <x-slot name="header">
        <ul class="uk-breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="{{ route('blog.admin.categories.index') }}">{{ __('Категории блога') }}</a></li>
            <li><span>{{ __($item->title) }}</span></li>
        </ul>
    </x-slot>
    <x-slot name="body">
        <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
            @method('PATCH')
            @csrf
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">{{ __('Названия категории') }}</legend>
                    <div class="uk-margin">
                        <input class="uk-input" name="title" placeholder="Названия категории" value="{{$item->title}}">
                    </div>
                    <legend class="uk-legend">{{ __('Адрес категории') }}</legend>
                    <div class="uk-margin">
                        <input class="uk-input" name="slug" placeholder="Названия категории" value="{{$item->slug}}">
                    </div>
                    <div class="uk-margin">
                        <select class="uk-select">
                            @foreach($categoryList as $optionCategory)
                                <option
                                    value="{{$optionCategory->id}}"
                                    @if($optionCategory->id == $item->parent_id) selected="selected" @endif;
                                >{{$optionCategory->id}}- {{$optionCategory->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" rows="5" placeholder="Textarea" name="description">
                            {{ old('description',$item->description) }}</textarea>
                    </div>
                    <button class="uk-button uk-button-default" type="submit">Submit</button>
                </fieldset>
            </form>
    </x-slot>
</x-app-layout>



