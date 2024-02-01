{if $post->hasCommentsOpen}
	<div class="comments-link">
		<a href="{$post->commentsUrl}" title="{__ 'Comments on %s'|printf: $post->title}">
			{if $post->commentsNumber > 1}
				<span class="comments-count" title="{__ '%d Comments'|printf: $post->commentsNumber}">
					{__ '%d Comments'|printf: $post->commentsNumber}
				</span>
			{elseif $post->commentsNumber == 0}
				<span class="comments-count" title="{__ 'Leave a comment'}">
					{__ '0 Comments'}
				</span>
			{else}
				<span class="comments-count" title="{__ '1 Comment'}">
					{__ '1 Comment'}
				</span>
			{/if}
		</a>
	</div><!-- .comments-link -->
{/if}