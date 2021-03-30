<x-app-layout>
    <x-slot name="header">
        <ul class="uk-breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="{{ route('blog.admin.categories.index') }}">{{ __('Секції конференції') }}</a></li>
            <li><span>{{ __($item->title) }}</span></li>
        </ul>
    </x-slot>
    <x-slot name="body">
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @php
                        /** @var \Illuminate\Support\ViewErrorBag $errors */
                    @endphp
                    @if($errors->any())
                        <div class="uk-alert-danger" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p>{{$errors->first()}}</p>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="uk-alert-success" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p>{{session()->get('success')}}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('conference.admin.sections.store') }}">

                                    @csrf
                                    <fieldset class="uk-fieldset">

                                        <legend class="uk-legend">{{ __('Назва секції') }}</legend>
                                        <div class="uk-margin">
                                            <input class="uk-input" name="title" placeholder="Назва секції" value="{{old('title', $item->title)}}">
                                        </div>
                                        <legend class="uk-legend">{{ __('Адреса секції') }}</legend>
                                        <div class="uk-margin">
                                            <input class="uk-input" name="slug" placeholder="Генерується автоматично" value="{{ old('slug', $item->slug) }}">
                                        </div>
                                        <div class="uk-margin">
                                            <select class="uk-select" name="parent_id">
                                                @foreach($categoryList as $optionCategory)
                                                    <option
                                                        value="{{$optionCategory->id}}"
                                                        @if($optionCategory->id == $item->parent_id) selected="selected" @endif;
                                                    >{{$optionCategory->id}}- {{$optionCategory->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="uk-margin">
                                            <textarea class="uk-textarea" rows="5" placeholder="Textarea" name="description">{{ old('description',$item->description) }}</textarea>
                                        </div>
                                        <button class="uk-button uk-button-default" type="submit">Сохранить</button>
                                    </fieldset>
                                </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>



