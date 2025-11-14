<?php if(!defined('ABSPATH')) exit; ?>
<?php
$snippetJson = [];
global $post;
$faqPost = get_post($post);
$postContent = $faqPost->post_content;
$faqDump = parse_blocks($postContent);
foreach ($faqDump as $block) {
	if($block['blockName'] == "safirtema/sorucevap") {
        $text = $block['innerHTML'];
        preg_match('/<span class="text">(.*?)<\/span>/s', $text, $question);
        preg_match('/<p class="answer">(.*?)<\/p>/s', $text, $answer);
        $snippetJson[] = [
            "@type" => "Question",
            "name" => $question[1],
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => str_replace('"', '', $answer[1]),
            ]
        ];
    }
}

if(count($snippetJson) > 0 ) :
?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php echo json_encode($snippetJson); ?>
    ]
}
</script>
<?php endif; ?>
