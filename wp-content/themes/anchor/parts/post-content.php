
	{if !$wp->isSingular}

		{if $wp->isSearch}

			{*** SEARCH RESULTS ONLY ***}

			<article {!$post->htmlId} {!$post->htmlClass}>
				<header class="entry-header">

					<div class="entry-title">

						{includePart parts/entry-date-format, dateIcon => $post->rawDate, dateLinks => 'no', dateShort => 'no'}

						<div class="entry-title-wrap">

							<h2><a href="{$post->permalink}">{!$post->title}</a></h2>

							{if $post->isInAnyCategory}
								{includePart parts/entry-categories}
							{/if}

						</div><!-- /.entry-title-wrap -->
					</div><!-- /.entry-title -->
				</header><!-- /.entry-header -->

				<div class="entry-content loop">
					{!$post->excerpt}
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<a href="{$post->permalink}" class="more">{!__ '%s Read more'|printf: '<span class="meta-nav">&rarr;</span>'}</a>
				</footer><!-- /.entry-footer -->
			</article>

		{else}

			{*** STANDARD LOOP ***}

			<article {!$post->htmlId} {!$post->htmlClass}>

				<div class="entry-thumbnail">
					{if $post->hasImage}
						<div class="entry-thumbnail-wrap entry-content">
						<a href="{$post->permalink}" class="thumb-link">
							<span class="entry-thumbnail-icon">
								<img src="{imageUrl $post->imageUrl, width => 900, height => 600, crop => 1}">
							</span>
						</a>
						</div>
					{/if}

					<div class="entry-meta">
						{if $post->isSticky and !$wp->isPaged and $wp->isHome}
							<span class="featured-post">{__ 'Featured post'}</span>
						{/if}

						{capture $editLinkLabel}<span class="edit-link">{!__ 'Edit'}</span>{/capture}
      					{!$post->editLink($editLinkLabel)}
					</div><!-- /.entry-meta -->
				</div>

				<div class="post-right-wrap">
					<header class="entry-header {if !$post->hasImage}nothumbnail{/if}">

						<div class="entry-title">

							<div class="entry-title-wrap">

								<h2><a href="{$post->permalink}">{!$post->title}</a></h2>

								<div class="entry-data">

									{var $dateIcon = $post->date('c')}
									{var $dateLinks = 'no'}
									{var $dateShort = 'no'}

									{includePart parts/entry-date-format, dateIcon => $dateIcon, dateLinks => $dateLinks, dateShort => $dateShort}

									{if $post->type == post}
										{includePart parts/entry-author}
									{/if}

									{includePart parts/comments-link}

								</div>

							</div><!-- /.entry-title-wrap -->

						</div><!-- /.entry-title -->

					</header><!-- /.entry-header -->


					<div class="entry-content loop">
						{!$post->excerpt}
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<a href="{$post->permalink}" class="more">{!__ 'Read more'}</a>
					</footer><!-- .entry-footer -->

				</div>

			</article>
		{/if}

	{else}

		{*** POST DETAIL ***}

		<article {!$post->htmlId} class="content-block">
			<header class="entry-header">

					<h1>{!$post->title}</h1>

					{if $post->imageUrl}
						<div class="entry-thumbnail">
							<div class="entry-thumbnail-wrap">
								<a href="{$post->imageUrl}" class="thumb-link">
									<span class="entry-thumbnail-icon">
										<img src="{imageUrl $post->imageUrl, width => 1000, height => 500, crop => 1}" alt="{$post->imageUrl}">
									</span>
								</a>
							</div>
						</div>
					{/if}

					<div class="entry-data">

						{var $dateIcon = $post->date('c')}
						{var $dateLinks = 'no'}
						{var $dateShort = 'no'}

						{includePart parts/entry-date-format, dateIcon => $dateIcon, dateLinks => $dateLinks, dateShort => $dateShort}

						{if $post->type == post}
							{includePart parts/entry-author}
						{/if}

						{includePart parts/comments-link}

						{includePart parts/entry-categories}

					</div>

			</header>


			<div class="entry-content">
				{!$post->content}
				{!$post->linkPages}
			</div><!-- .entry-content -->

			<footer class="entry-footer">

				{if $post->tagList}
					<span class="tags">
						{__ ''} <span class="tags-links">{!$post->tagList}</span>
					</span>
				{/if}

				{if $wp->isSingle and $post->author->bio and $post->author->isMulti}
					{includePart parts/author-bio}
				{/if}
			</footer><!-- .entry-footer -->
		</article>

	{/if}
