{*
	$lang->id
	$lang->slug
	$lang->name
	$lang->url
	$lang->flagUrl
	$lang->flag
	$lang->isCurrent
	$lang->hasTranslation
	$lang->htmlClass
*}

{if $languages}
	<div class="language-icons">
		{foreach $languages as $lang}
			{if $lang->isCurrent}
				<a hreflang="{$lang->slug}" href="#" class="language-icons__icon language-icons__icon_main {$lang->htmlClass}">
					{!$lang->flag}
					{$lang->slug}
				</a>
			{/if}
		{/foreach}
		<ul class="language-icons__list">
		{foreach $languages as $lang}
			{if !$lang->isCurrent}
				<li>
					<a hreflang="{$lang->slug}" href="{$lang->url}" class="language-icons__icon {$lang->htmlClass}">
						{!$lang->flag}
						{$lang->name}
					</a>
				</li>
			{/if}
		{/foreach}
		</ul>
	</div>
{/if}
