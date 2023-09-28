<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
    @foreach ($breadcrumbs as $breadcrumb)
        {
            "@type": "ListItem",
            "position": {{$loop->index + 1}},
                "name": "{{$breadcrumb->title}}",
                "item": "{{$breadcrumb->url}}"
        @if($loop->last)
            }
        @else
            },
        @endif
    @endforeach
    ]
  }
</script>