document.addEventListener("DOMContentLoaded", () => {
    const track = document.querySelector('.carousel-track');
    const items = document.querySelectorAll('.carousel-item');
    const dotsContainer = document.createElement('div');
    dotsContainer.classList.add('carousel-dots');
    document.querySelector('.carousel').appendChild(dotsContainer);

    items.forEach((_, index) => {
        const dot = document.createElement('span');
        if (index === 0) dot.classList.add('active');
        dotsContainer.appendChild(dot);
    });

    let currentIndex = 0;

    const updateCarousel = () => {
        const dots = document.querySelectorAll('.carousel-dots span');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
        track.style.transform = `translateX(-${currentIndex * 100}%)`;

    };

    const autoSlide = () => {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
    };

    setInterval(autoSlide, 3000); // Slide every 3 seconds

    document.querySelectorAll('.carousel-dots span').forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
        });
    });
});


//for search
$(document).ready(function() {
    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('search.autocomplete') }}",
                type: 'GET',
                dataType: "json",
                data: {
                    query: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.value,
                            value: item.value,
                            data: item.data
                        };
                    }));
                }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            // Optionally, you can do something when a suggestion is selected
            // For example, directly submit the form with the selected value
            $("#search").val(ui.item.value);
            $("form.search-form").submit();
        }
    });
});