<div id="comments" class="comments-area">
{if $post->hasComments}
	<h2 class="comments-title">{__ 'Comments (%s)'|printf:$post->commentsNumber}</h2>

	<ol class="commentlist">
	{loopComments as $comment}

		{if !$comment->isNormal}

		<li {!$comment->htmlClass} {!$comment->htmlId('li-')}>
			{capture $editLinkLabel}({__ 'Edit'}){/capture}
			<p>{__ 'Pingback:'} {!$comment->author->link} <span class="edit-link">{!$comment->editLink($editLinkLabel)}</span></p>

		{else}

		<li {!$comment->htmlClass} {!$comment->htmlId('li-')}>
			<article {!$comment->htmlId} class="comment-article">

				<header class="comment-meta">
					<div class="comment-author vcard">
						{!$comment->author->avatar(60)}
						<cite class="fn">{!$comment->author->link}</cite>
					</div><!-- .comment-meta -->

					<a href="{$comment->url}">
						<time datetime="{$comment->time(c)}">
							<span class="date">{$comment->date}</span>
							<span class="time">{$comment->time}</span>
						</time>
					</a>

					<div class="comment-tools">
						{capture $editLinkLabel}<span class="edit-link">{!__ 'Edit'}</span>{/capture}
	      				{!$comment->editLink($editLinkLabel)}

						{capture $replyLinkLabel}<span class="reply">{!__ 'Reply'}</span>{/capture}
						{!$comment->replyLink($replyLinkLabel)}
					</div>

				</header>

				<div class="entry-content comment-content">
					{if !$comment->isApproved}
						<p class="comment-awaiting-moderation">{__ 'Your comment is awaiting moderation.'}</p>
					{else}
						{!$comment->text}
					{/if}
				</div><!-- .comment-content -->

			</article><!-- #comment-## -->

			{* there is no </li> tag, it is handled by comment walker class *}
		{/if}
	{/loopComments}
	</ol><!-- .commentlist -->


	{if $post->willCommentsPaginate}
	<nav class="navigation comment-navigation" role="navigation">
		<h1 class="assistive-text section-heading">{__ 'Comment navigation'}</h1>
		<div class="nav-previous">{prevCommentsLink '&larr; Older Comments'}</div>
		<div class="nav-next">{nextCommentsLink 'Newer Comments &rarr;'}</div>
	</nav>
	{/if}

	{if $post->hasCommentsClosed}
		<p class="nocomments">{__ 'Comments are closed.'}</p>
	{/if}
{/if}

{commentForm}

</div><!-- #comments .comments-area -->
