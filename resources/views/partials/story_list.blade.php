@foreach($stories as $story)
    <div class="col">
        <div class="box">
            <a href="{{ route('storymode.detail', $story->id) }}" class="imgBox">
                <img style="width: 100%;height: 200px;object-fit: cover;object-position: top;" src="https://queensoftenimages.s3.us-west-1.amazonaws.com/{{$story->image}}"/>
            </a>
            <div class="description">{{$story->title}}</div>
        </div>
    </div>
@endforeach
