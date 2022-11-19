<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">


@foreach($courses as $course)
<url>
  <loc>{{ URL::to('courses/'.$course->slug) }}</loc>
  <lastmod>{{ $course->created_at->tz('UTC')->toAtomString() }}</lastmod>
  <changefreq>weekly</changefreq>
  <priority>0.9</priority>
</url>
@endforeach

</urlset>