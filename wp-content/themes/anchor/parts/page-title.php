{* ********************************************************* *}
{* COMMON DATA                                               *}
{* ********************************************************* *}

	{capture $editLinkLabel}<span class="edit-link">{!__ 'Edit'}</span>{/capture}

	{var $titleClass = ''}
	{var $titleName = ''}
	{var $editButton = ''}
	{var $titleImage = ''}
	{var $dateIcon = ''}
	{var $dateLinks = ''}
	{var $dateShort = ''}
	{var $dateInterval = ''}
	{var $titleAuthor = ''}
	{var $titleCategory = ''}
	{var $titleComments = ''}
	{var $titleSubDesc = ''}
	{var $titleDesc = $el->option(description)}
	{var $showPager = ''}


{* ********************************************************* *}
{* for 404, SEARCH and WOOCOMMERCE                           *}
{* ********************************************************* *}

{if $wp->is404 or $wp->isSearch or $wp->isWoocommerce()}

	{* CLASS ********** *} {if $wp->is404}				{var $titleClass = "simple-title"} {/if}
	{* CLASS ********** *} {if $wp->isSearch}			{var $titleClass = "simple-title"} {/if}
	{* CLASS ********** *} {if $wp->isWoocommerce()}	{var $titleClass = "simple-title"} {/if}

	{* TITLE ********** *} {if $wp->is404}				{capture $titleName}{__ "This is somewhat embarrassing, isn't it?"}{/capture}			{/if}
	{* TITLE ********** *} {if $wp->isSearch}			{capture $titleName}
															{capture $searchTitle}<span class="title-data">{$wp->searchQuery}</span>{/capture}
															{!__ 'Search Results for: %s'|printf: $searchTitle}
														{/capture}																				{/if}
	{* TITLE ********** *} {if $wp->isWoocommerce()}	{capture $titleName}{? woocommerce_page_title()}{/capture}								{/if}

{* ********************************************************* *}
{* for PAGES, POST DETAIL, IMAGE DETAIL and PORTFOLIO DETAIL *}
{* for LOOP pages only                                       *}
{* ********************************************************* *}

{elseif $wp->isPage or $wp->isSingular(post) or $wp->isSingular(portfolio-item) or $wp->isSingular(event) or $wp->isSingular(job-offer) or $wp->isAttachment}
{loop as $post}

	{* CLASS ********** *} {if $wp->isPage} 					{var $titleClass = "standard-title"} 				{/if}
	{* CLASS ********** *} {if $wp->isSingular(post)} 			{var $titleClass = "post-title"} 					{/if}
	{* CLASS ********** *} {if $wp->isSingular(portfolio-item)} {var $titleClass = "post-title portfolio-title"} 	{/if}
	{* CLASS ********** *} {if $wp->isSingular(event)} 			{var $titleClass = "post-title event-title"} 		{/if}
	{* CLASS ********** *} {if $wp->isSingular(job-offer)} 		{var $titleClass = "post-title job-offer-title"}	{/if}
	{* CLASS ********** *} {if $wp->isAttachment}				{var $titleClass = "post-title attach-title"}		{/if}

	{* META DATA ****** *} {if $wp->isSingular(event)}			{var $meta = $post->meta(event-data)}
						   {elseif $wp->isSingular(job-offer)}	{var $meta = $post->meta(offer-data)}
						   {/if}

	{* TITLE ********** *} {var $titleName = $post->title}
	{* IMAGE ********** *} {var $titleImage = $post->imageUrl}
						   {if $wp->isAttachment or $wp->isSingular(portfolio-item) or $wp->isSingular(job-offer) or $wp->isSingular(post)} {var $titleImage = ''} {/if}
	{* EDIT *********** *} {capture $editButton}{!$post->editLink($editLinkLabel)}{/capture}



	{* DATE ICON ****** *} {if $wp->isSingular(event)} 			{var $dateIcon = $meta->dateFrom} 		{var $dateLinks = 'no'} 	{var $dateShort = 'no'} {/if}
	{* DATE ICON ****** *} {if $wp->isSingular(job-offer)} 		{var $dateIcon = $meta->validFrom} 		{var $dateLinks = 'no'} 	{var $dateShort = 'no'} {/if}
	{* DATE ICON ****** *} {if $wp->isAttachment} 				{var $dateIcon = $post->rawDate}  		{var $dateLinks = 'no'}		{var $dateShort = 'no'} {/if}

	{* DATE INTERVAL ** *} {if $wp->isSingular(event)}			{capture $intLabel}{__ 'Duration:'}{/capture}
																{var $intFrom = $meta->dateFrom}
																{var $intTo = $meta->dateTo}
																{if $intTo}{var $dateInterval = 'yes'}{/if}
						   {/if}
	{* DATE INTERVAL ** *} {if $wp->isSingular(job-offer)}		{capture $intLabel}{__ 'Validity:'}{/capture}
																{var $intFrom = $meta->validFrom}
																{var $intTo = $meta->validTo}
																{var $dateInterval = 'yes'}
						   {/if}


	{* AUTHOR ********* *} {if $wp->isAttachment} 				{var $titleAuthor = 'yes'} {/if}

	{* CATEGORY ******* *} {if $post->categoryList}				{var $titleCategory = 'yes'} {/if}
	{* CATEGORY ******* *} {if $wp->isSingular(portfolio-item)}	{var $titleCategory = 'no'} {/if}
	{* CATEGORY ******* *} {if $wp->isSingular(post)}			{var $titleCategory = 'no'} {/if}


{/loop}

{* ********************************************************* *}
{* for BLOG PAGE ONLY                                        *}
{* ********************************************************* *}

{elseif $wp->isBlog and $blog}

	{* CLASS ********** *} {var $titleClass = "blog-title"}
	{* TITLE ********** *} {var $titleName = $blog->title}
	{* IMAGE ********** *} {var $titleImage = $blog->imageUrl}
	{* EDIT *********** *} {capture $editButton}{!$blog->editLink($editLinkLabel)}{/capture}

{* ********************************************************* *}
{* for CATEGORY, ARCHIVE, TAG and AUTHOR                     *}
{* ********************************************************* *}

{elseif $wp->isCategory or $wp->isArchive or $wp->isTag or $wp->isAuthor or $wp->isTax(portfolios)}

	{* CLASS ********** *} {var $titleClass = "archive-title"}

	{* TITLE ********** *} {if $wp->isCategory}					{capture $titleName}
																	{capture $categoryTitle}<span class="title-data">{$category->title}</span>{/capture}
																	{!__ 'Category Archives: %s'|printf: $categoryTitle}
																{/capture}
	{* TITLE ********** *} {elseif $wp->isTag}					{capture $titleName}
																	{capture $tagTitle}<span class="title-data">{$tag->title}</span>{/capture}
																	{!__ 'Tag Archives: %s'|printf: $tagTitle}
																{/capture}
	{* TITLE ********** *} {elseif $wp->isPostTypeArchive}		{capture $titleName}
																	{capture $archiveTitle}<span class="title-data">{$archive->title}</span>{/capture}
																	{!__ 'Archives: %s'|printf: $archiveTitle}
																{/capture}
	{* TITLE ********** *} {elseif $wp->isTax}					{capture $titleName}
																	{capture $taxonomyTitle}<span class="title-data">{$taxonomyTerm->title}</span>{/capture}
																	{!__ 'Category Archives: %s'|printf: $taxonomyTitle}
																{/capture}
	{* TITLE ********** *} {elseif $wp->isAuthor}				{capture $titleName}
																	{capture $authorTitle}<span class="title-data">{$author}</span>{/capture}
																	{!__ 'All posts by %s'|printf: $authorTitle}
																{/capture}
	{* TITLE ********** *} {elseif $wp->isArchive}
								{if $archive->isDay}			{capture $titleName}
																	{capture $dayTitle}<span class="title-data">{$archive->dateI18n('F j, Y')}</span>{/capture}
																	{!__ 'Daily Archives: %s'|printf: $dayTitle}
																{/capture}
								{elseif $archive->isMonth}		{capture $titleName}
																	{capture $monthFormat}{_x 'F Y', 'monthly archives date format'}{/capture}
																	{capture $monthTitle}<span class="title-data">{$archive->dateI18n($monthFormat)}</span>{/capture}
																	{!__ 'Monthly Archives: %s'|printf: $monthTitle}
																{/capture}
								{elseif $archive->isYear}		{capture $titleName}
																	{capture $yearFormat}{_x 'Y',  'yearly archives date format'}{/capture}
																	{capture $yearTitle}<span class="title-data">{$archive->dateI18n($yearFormat)}</span>{/capture}
																	{!__ 'Yearly Archives: %s'|printf: $yearTitle}
																{/capture}
								{else}							{capture $titleName}{!__ 'Archives:'}{/capture}
								{/if}
						   {/if}

	{* SUBDESC ******** *} {if $wp->isCategory}					{var $titleSubDesc = $category->description} 	{/if}
	{* SUBDESC ******** *} {if $wp->isTag}						{var $titleSubDesc = $tag->description} 		{/if}

{/if}


{* ********************* *}
{* RESULTS               *}
{* ********************* *}

<div style="display: none;">
{$titleClass}
{!$titleName}
{!$editButton}
{$titleImage}
{$dateIcon}
{$dateLinks}
{$dateShort}

{if $dateInterval == 'yes'}{$intLabel} {$intFrom|dateI18n} - {$intTo|dateI18n}{/if}
{if $titleAuthor == 'yes'}{includePart parts/entry-author}{/if}
{if $titleCategory == 'yes'}{includePart parts/entry-categories}{/if}
{if $titleComments == 'yes'}{includePart parts/comments-link}{/if}
{!$titleSubDesc}
{!$titleDesc}
</div>


<div class="page-title">
	<div class="grid-main">
		<header class="entry-header">

			<div class="entry-title {$titleClass}">

				{includePart parts/entry-date-format, dateIcon => $dateIcon, dateLinks => $dateLinks, dateShort => $dateShort}

				<div class="entry-title-wrap">

					{includePart parts/breadcrumbs}
					<h1>{!$titleName}</h1>



					{if $dateInterval == 'yes' or $titleAuthor == 'yes' or $titleCategory == 'yes' or $titleComments == 'yes' or $titleSubDesc}
						<div class="entry-data">

							{if $dateInterval == 'yes'}
								<div class="date-interval">
									<span class="date-interval-title"><strong>{$intLabel}</strong></span>
									<time class="event-from" datetime="{$intFrom|date:'c'}">{$intFrom|dateI18n}</time>
									<span class="date-sep">-</span>
									<time class="event-to" datetime="{$intTo|date:'c'}">{$intTo|dateI18n}</time>
								</div>
							{/if}


							{if $titleAuthor == 'yes'} 		{includePart parts/entry-author}		{/if}
							{if $titleCategory == 'yes'}	{includePart parts/entry-categories}	{/if}
							{if $titleComments == 'yes'}	{includePart parts/comments-link}		{/if}
							{if $titleSubDesc}				{!$titleSubDesc}						{/if}
						</div>
					{/if}

					{if $editButton}
						<div class="entry-meta">
							{!$editButton}
						</div>
					{/if}

				</div>
			</div>

			{if $titleImage}
				<div class="entry-thumbnail">
					<div class="entry-thumbnail-wrap">
						<a href="{$titleImage}" class="thumb-link">
							<span class="entry-thumbnail-icon">
								<img src="{imageUrl $titleImage, width => 1000, height => 500, crop => 1}" alt="{$titleName}">
							</span>
						</a>
					</div>
				</div>
			{/if}

			{if $titleDesc}
				<div class="page-description">{!$titleDesc}</div>
			{/if}

			{if $showPager}
			<nav class="nav-single" role="navigation">
				{includePart parts/pagination arrow => left}
				{includePart parts/pagination arrow => right}
			</nav>
			{/if}

		</header><!-- /.entry-header -->
	</div>
</div>