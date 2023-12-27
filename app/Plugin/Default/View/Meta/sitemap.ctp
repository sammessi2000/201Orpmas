<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url> 
        <loc><?php echo Router::url('/',true); ?></loc> 
        <lastmod><?php echo date('Y-m-d\TH:i\Z', $this->data[0]['Node']['modified']); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url> 
    <?php foreach ($this->data as $v) : ?> 
    <url> 
        <loc><?php echo DOMAIN;?><?php echo	$v['Node']['slug']?>.html</loc> 
        <lastmod><?php echo date('Y-m-d\TH:i\Z', $v['Node']['modified']); ?></lastmod> 
        <?php 
            $changefreq = $this->App->get_sitemap_changefreq($v['Node']['type']);
            if($changefreq != "") 
            {
                echo '<changefreq>' . $changefreq . '</changefreq>';
            }
            
            $priority = $this->App->get_sitemap_priority($v['Node']['type']); 
            if($priority != "") 
            {
                echo '<priority>' . $priority . '</priority>';
            }
        ?>
        
    </url>
    <?php endforeach; ?>
</urlset> 