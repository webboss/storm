<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Блог') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

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
                    <ul class="uk-pagination" uk-margin>
                        <li><a href="#"><span uk-pagination-previous></span></a></li>
                        <li><a href="#">1</a></li>
                        <li class="uk-disabled"><span>...</span></li>
                        <li><a href="#">6</a></li>
                        <li class="uk-active"><span>7</span></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#"><span uk-pagination-next></span></a></li>
                    </ul>
                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                            <thead>
                            <tr>
                                <th class="uk-table-shrink"></th>
                                <th class="uk-table-shrink">Preserve</th>
                                <th class="uk-table-expand">Expand + Link</th>
                                <th class="uk-width-small">Truncate</th>
                                <th class="uk-table-shrink uk-text-nowrap">Shrink + Nowrap</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input class="uk-checkbox" type="checkbox"></td>
                                <td><img class="uk-preserve-width uk-border-circle" src="https://getuikit.com/docs/images/avatar.jpg" width="40" alt=""></td>
                                <td class="uk-table-link">
                                    <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
                                </td>
                                <td class="uk-text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                                <td class="uk-text-nowrap">Lorem ipsum dolor</td>
                            </tr>
                            <tr>
                                <td><input class="uk-checkbox" type="checkbox"></td>
                                <td><img class="uk-preserve-width uk-border-circle" src="https://getuikit.com/docs/images/avatar.jpg" width="40" alt=""></td>
                                <td class="uk-table-link">
                                    <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
                                </td>
                                <td class="uk-text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                                <td class="uk-text-nowrap">Lorem ipsum dolor</td>
                            </tr>
                            <tr>
                                <td><input class="uk-checkbox" type="checkbox"></td>
                                <td><img class="uk-preserve-width uk-border-circle" src="https://getuikit.com/docs/images/avatar.jpg" width="40" alt=""></td>
                                <td class="uk-table-link">
                                    <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
                                </td>
                                <td class="uk-text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                                <td class="uk-text-nowrap">Lorem ipsum dolor</td>
                            </tr>
                            <tr>
                                <td><input class="uk-checkbox" type="checkbox"></td>
                                <td><img class="uk-preserve-width uk-border-circle" src="https://getuikit.com/docs/images/avatar.jpg" width="40" alt=""></td>
                                <td class="uk-table-link">
                                    <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
                                </td>
                                <td class="uk-text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                                <td class="uk-text-nowrap">Lorem ipsum dolor</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
