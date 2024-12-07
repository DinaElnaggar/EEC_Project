@foreach ($products as $index => $data)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>
            <a data-fancybox="" href="{{ get_file($data->image) }}">
                <img height="60px" src="{{ get_file($data->image) }}">
            </a>
        </td>
        <td><a href="{{ route('products_search.show', ['products_search' => $data->id]) }}">{{ $data->title }}</a></td>
    </tr>
@endforeach
