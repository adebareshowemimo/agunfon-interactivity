<!-- Testimonials Section -->
@php
    $testimonials = [
        [
            'quote' => 'Exceptional to work with. The team took real ownership of the project — fast turnaround without ever sacrificing precision, and clear, reliable communication throughout. I would absolutely recommend them.',
            'project' => 'PowerPoint Add-In (VBA / RibbonX)',
            'rating' => '5.0',
        ],
        [
            'quote' => 'A massive project — SCORM/HTML5 for ~1,850 slides with branching, animations and knowledge checks. Available on request, fast on changes, great rapport. Strongly recommended.',
            'project' => 'eLearning Content — Adobe Captivate',
            'rating' => '5.0',
        ],
        [
            'quote' => 'Incredibly helpful — went above and beyond to solve issues that were outside the original scope. Their dedication and expertise were invaluable. Highly recommend.',
            'project' => 'Instructional Design — Captivate',
            'rating' => '5.0',
        ],
        [
            'quote' => 'I needed a SCORM training file and the team delivered it within hours, perfectly. They even provided a sample at no cost to test. Highly recommend.',
            'project' => 'SCORM Training File',
            'rating' => '5.0',
        ],
        [
            'quote' => 'A pleasure to work with. Their communication and technical skills were exemplary. We will not hesitate to work with them again.',
            'project' => 'Moodle eLearning Site',
            'rating' => '5.0',
        ],
        [
            'quote' => 'An excellent DevOps team, highly experienced in Moodle deployment and management. They communicate well and keep clients updated. Would definitely work with them again.',
            'project' => 'Moodle DevOps & Deployment',
            'rating' => '4.9',
        ],
        [
            'quote' => 'Responsive, committed, and reliable — a team that genuinely wants to produce good work.',
            'project' => 'Talent LMS & Articulate Rise 360',
            'rating' => '5.0',
        ],
        [
            'quote' => "Fantastic to work with. We'd definitely recommend their skills and talents for your JavaScript needs.",
            'project' => 'JavaScript in Articulate Storyline',
            'rating' => '5.0',
        ],
        [
            'quote' => 'Highly skilled — speed, efficiency, and professionalism. Working with the team was a pleasure.',
            'project' => 'Moodle LMS Setup',
            'rating' => '5.0',
        ],
        [
            'quote' => 'An amazing job, as usual. The team really knows what they\'re doing!',
            'project' => 'Moodle LMS Setup (Repeat Client)',
            'rating' => '5.0',
        ],
    ];
@endphp

<style>
    #testimonials-carousel .testi-track::-webkit-scrollbar { display: none; }
    #testimonials-carousel .testi-track { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <span class="inline-flex items-center gap-2 text-xs font-semibold text-brand-600 bg-brand-50 px-3 py-1 rounded-full mb-4">
            <iconify-icon icon="fa-solid:star" class="text-amber-400"></iconify-icon>
            Rated 5.0 by our clients
        </span>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
            What our <span class="font-serif italic text-brand-500 font-medium">clients</span> are saying
        </h2>
        <p class="mt-3 text-sm text-gray-500 max-w-lg mx-auto">
            Verified reviews from clients who rely on us to power their learning, compliance, and workforce development
        </p>
    </div>

    <div class="relative" id="testimonials-carousel">
        <!-- Track -->
        <div class="testi-track flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4 -mx-1 px-1">
            @foreach($testimonials as $t)
            <div class="testi-card snap-start shrink-0 basis-full sm:basis-1/2 lg:basis-[calc((100%-3.75rem)/4)] bg-white rounded-[20px] p-6 shadow-sm border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-1 text-amber-400 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <iconify-icon icon="fa-solid:star" class="text-sm"></iconify-icon>
                        @endfor
                    </div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">"{{ $t['quote'] }}"</p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-50">
                    <div class="w-10 h-10 rounded-full bg-brand-500 text-white flex items-center justify-center shrink-0">
                        <iconify-icon icon="lucide:badge-check" class="text-lg"></iconify-icon>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm leading-tight">{{ $t['project'] }}</h4>
                        <p class="text-[10px] text-gray-500">Verified Client · ★ {{ $t['rating'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button type="button" class="testi-prev absolute -left-3 lg:-left-5 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-md border border-gray-100 flex items-center justify-center text-gray-600 hover:text-brand-600 hover:shadow-lg transition-all z-10" aria-label="Previous testimonials">
            <iconify-icon icon="lucide:chevron-left" class="text-xl"></iconify-icon>
        </button>
        <button type="button" class="testi-next absolute -right-3 lg:-right-5 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-md border border-gray-100 flex items-center justify-center text-gray-600 hover:text-brand-600 hover:shadow-lg transition-all z-10" aria-label="Next testimonials">
            <iconify-icon icon="lucide:chevron-right" class="text-xl"></iconify-icon>
        </button>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var root = document.getElementById('testimonials-carousel');
        if (!root) return;
        var track = root.querySelector('.testi-track');
        var prev = root.querySelector('.testi-prev');
        var next = root.querySelector('.testi-next');

        function page(dir) {
            track.scrollBy({ left: dir * Math.round(track.clientWidth * 0.9), behavior: 'smooth' });
        }
        prev.addEventListener('click', function () { page(-1); });
        next.addEventListener('click', function () { page(1); });

        function updateButtons() {
            var atStart = track.scrollLeft <= 2;
            var atEnd = track.scrollLeft + track.clientWidth >= track.scrollWidth - 2;
            prev.style.opacity = atStart ? '0.4' : '1';
            prev.style.pointerEvents = atStart ? 'none' : 'auto';
            next.style.opacity = atEnd ? '0.4' : '1';
            next.style.pointerEvents = atEnd ? 'none' : 'auto';
        }
        track.addEventListener('scroll', updateButtons, { passive: true });
        window.addEventListener('resize', updateButtons);
        updateButtons();
    })();
</script>
@endpush
