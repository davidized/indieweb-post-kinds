<?php
/* Default Template 
 *	The Goal of this Template is to be a general all-purpose model that will be replaced by customization in other templates
 */

$content = '<div class="h-cite response ';
// Add in the appropriate type
switch ( $kind )  {
	case 'like':
          $content .= 'p-like-of';
        break;
        case 'favorite':
          $content .= 'p-favorite-of';
        break;
        case 'repost':
          $content .= 'p-repost-of';
        break;
        case 'reply':
				case 'rsvp':
          $content .= 'p-in-reply-to';
        break;
        case 'tag':
          $content .= 'p-tag-of';
        break;
        case 'bookmark':
          $content .= 'p-bookmark-of';
        break;
        case 'listen':
          $content .= 'p-listen';
        break;
        case 'watch':
          $content .= 'p-watch';
        break;
        case 'game':
          $content .= 'p-play';
        break;
        case 'wish':
          $content .= 'p-wish';
        break;
	}
$content .= '">';
$content .= kind_icon($kind);
$content .= self::get_cite_title( $meta->get_cite(), $meta->get_url() );
$author = self::get_hcard( $meta->get_author() );
if ($author) { 
	$content .= ' ' . __('by', 'Post kinds') . ' ' . $author;
}
$site_name = self::get_site_name( $meta->get_cite(), $meta->get_url() );
if ($site_name) {
	$content .= '<em>(' . $site_name . ')</em>';
}
if ($cite) {
	if ( array_key_exists( 'summary', $cite ) ) {
		$content .= sprintf('<blockquote class="e-summary">%1s</blockquote>', $cite['summary']);
	}
}

// Close Response
$content .= '</div>';