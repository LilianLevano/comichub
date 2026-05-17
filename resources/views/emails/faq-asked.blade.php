<p>A new question has been posted by <strong>{{ $faq->user->name }}</strong>.</p>

<p><strong>Question:</strong> {{ $faq->question }}</p>

<p><strong>Category:</strong> {{ $faq->category->name }}</p>

<p><a href="{{ route('admin.faqs.edit', $faq->id) }}">Answer it in the admin panel</a></p>
