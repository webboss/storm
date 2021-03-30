<x-app-layout>
    <x-slot name="header">
        <ul class="uk-breadcrumb">
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><span> {{ __('Секції конференції') }}</span></li>
        </ul>
    </x-slot>

    <x-slot name="body">
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{route('conference.admin.sections.create')}}" class="uk-button uk-button-primary">{{ __('Створити секцію') }}</a>
                    <table class="table-auto uk-table uk-table-striped">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Категорія</th>
                            <th>Родітель</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginator as $item)
                            @php /** @var App\Models\BlogCategory $item */ @endphp
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="{{ route('blog.admin.categories.edit', $item->id) }}">{{ $item->title }}</a> </td>
                                <td>{{ $item->parent_id }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($paginator->total() > $paginator->count())
                        {{$paginator->links()}}
                    @endif
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
