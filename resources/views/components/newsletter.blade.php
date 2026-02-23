<section class="newsletter">
    <div class="newsletter-container">
        <h3 class="newsletter-title">Subscribe to newsletter</h3>
        <p class="newsletter-description">
            Be the first to see new articles, case studies, webinars, and tools that support smarter workforce development.
        </p>
        <form class="newsletter-form" action="#" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" class="newsletter-input" required>
                <button type="submit" class="btn btn-primary">Subscribe</button>
            </div>
        </form>
    </div>
</section>
