<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#">
            {{ $reply->owner->name }}
        </a> said {{ $reply->created_at->diffForHumans() }}
    </div>
    <div class="panel-body">
        <article>
            <div class="body">
                {{ $reply->body }}
            </div>
        </article>
    </div>
</div>
