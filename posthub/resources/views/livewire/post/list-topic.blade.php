<ul class="list-group" wire:poll="getTopics">
    <li class="my-3" style="list-style-type: none;">
        <a type="button" href="#" 
        class="d-flex justify-content-between align-items-start gap-5 link-primary text-decoration-none"
        wire:click="selectTopic('All')">
            All

            <span class="badge rounded-pill text-bg-primary d-flex align-items-center">
                {{ $allTopics }}
            </span>
        </a>
    </li>
    @foreach($topicList as $index => $topic)
        <li class="my-3" style="list-style-type: none;">
            <a type="button" href="#" 
                class="d-flex justify-content-between align-items-start gap-5 link-primary text-decoration-none"
                wire:click="selectTopic({{ $topic }})">
                {{ $topic->topic }}

                <span class="badge rounded-pill text-bg-primary d-flex align-items-center">
                    {{ $topic->total }}
                </span>
            </a>
        </li>
    @endforeach
</ul>
