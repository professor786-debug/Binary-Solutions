<!DOCTYPE html>
<html lang="en">
<x-head />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />

<style>
    body {
        /* background: linear-gradient(135deg, #f5f7ff, #e0e7ff); */
        font-family: 'Segoe UI', sans-serif;
    }

    .form-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
    }

    .form-card:hover {
        transform: translateY(-6px);
        box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.15);
    }

    .btn-submit {
        background: linear-gradient(135deg, #6c63ff, #836fff);
        color: #fff;
        padding: 12px 40px;
        font-size: 16px;
        border-radius: 30px;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #564fd6, #6c63ff);
        transform: scale(1.08);
    }

    /* Animations */
    .animate-fade-in {
        animation: fadeIn 1s ease forwards;
    }

    .animate-slide-up {
        animation: slideUp 1s ease forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    #otherInput {
        display: none;
    }

    .main-banner {
        padding: 209px 0px 79px 0px;
    }

    /* ✅ Checkbox & Radio styling (your original hover effect intact) */
    .form-check-input {
        position: relative;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #6c63ff;
        border-radius: 4px;
        cursor: pointer;
        outline: none;
        transition: all 0.3s ease;
    }

    .form-check-input[type="checkbox"]::after {
        content: "";
        position: absolute;
        top: 2px;
        left: 6px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .form-check-input[type="checkbox"]:hover {
        background: #6c63ff;
        border-color: #6c63ff;
    }

    .form-check-input[type="checkbox"]:hover::after {
        opacity: 1;
    }

    .form-check-input[type="checkbox"]:checked {
        background: #6c63ff;
    }

    .form-check-input[type="checkbox"]:checked::after {
        opacity: 1;
    }

    /* Radio */
    .form-check-input[type="radio"] {
        border-radius: 50%;
    }

    .form-check-input[type="radio"]::after {
        content: "";
        position: absolute;
        top: 4px;
        left: 4.2px;
        width: 8px;
        height: 8px;
        background: white;
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .form-check-input[type="radio"]:hover {
        background: #6c63ff;
        border-color: #6c63ff;
    }

    .form-check-input[type="radio"]:hover::after {
        opacity: 1;
    }

    .form-check-input[type="radio"]:checked {
        background: #6c63ff;
    }

    .form-check-input[type="radio"]:checked::after {
        opacity: 1;
    }

    .form-label {
        font-weight: 600
    }

    .form-check-label {
        font-weight: 600
    }

    .form-check-input:focus {
        box-shadow: 0px 0px 0 0rem rgba(13, 110, 253, .25);
    }

    .heading-custom {
        font-size: 28px;
        font-weight: 800;
        background: linear-gradient(135deg, #6c63ff, #836fff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;
        display: inline-block;
    }

    .heading-custom::after {
        content: "";
        position: absolute;
        bottom: -6px;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 3px;
        background: linear-gradient(135deg, #6c63ff, #836fff);
        border-radius: 2px;
    }

    .form-card {
        background: linear-gradient(135deg, #f8f9ff, #e9ecff, #d6d8ff, #c2c3ff);
        border-radius: 18px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
    }
</style>

<body>
    <!-- Header -->
    @include('header')

    <!-- ✅ Main Banner untouched -->
    <section class="main-banner" style="background-image: url(assets/img/bg/course-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center z-1 position-relative wow fadeInUp">
                    <h2>CUSTOM SOLUTION</h2>
                    <p>
                        <a href="#">Home</a>
                        <i class='bx bx-chevrons-right'></i> Services
                        <i class='bx bx-chevrons-right'></i> Custom Solutions
                    </p>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/img/shapes/hsmile.svg') }}" alt="img" class="blshape">
        <img src="{{ asset('assets/img/shapes/hstart.svg') }}" alt="img" class="brshape">

        <div class="bbig_shape"></div>
    </section>

    <!-- ✅ Full Form -->
    <section class="container py-5">
        <div class="form-card p-4">

            <form class="animate-slide-up">
                <!-- Full Name -->
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="John Doe" disabled>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email ID</label>
                    <input type="email" class="form-control" value="johndoe@email.com" disabled>
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label">Title of Assignment / Project</label>
                    <input type="text" class="form-control" placeholder="Enter title">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="4" placeholder="Describe your requirements..."></textarea>
                </div>

                <!-- Upload -->
                <div class="mb-3">
                    <label class="form-label">Upload File</label>
                    <input type="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                    <small class="text-muted">Allowed: pdf, doc, word, jpg, jpeg, png | Max size: 500MB</small>
                </div>

                <!-- Checkboxes Inline -->
                <div class="mb-3">
                    <label class="form-label d-block">Type of work needed</label>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" id="hw">
                            <label class="form-check-label" for="hw">Homework Solution</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" id="report">
                            <label class="form-check-label" for="report">Complete Report</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" id="code">
                            <label class="form-check-label" for="code">Source Code</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" id="demo">
                            <label class="form-check-label" for="demo">Simulation Demo</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" id="otherCheck">
                            <label class="form-check-label" for="otherCheck">Others</label>
                        </div>
                    </div>
                    <input type="text" class="form-control mt-2" id="otherInput" placeholder="Specify">
                </div>

                <!-- Deadline -->
                <div class="mb-3">
                    <label class="form-label">Deadline</label>
                    <input type="date" class="form-control">
                </div>

                <!-- Radio Inline -->
                <div class="mb-3">
                    <label class="form-label d-block">Additional Preferences</label>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="prefs" id="short">
                            <label class="form-check-label" for="short">Short/Concise Answer</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="prefs" id="detailed">
                            <label class="form-check-label" for="detailed">Detailed Step by Step Explanation</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="prefs" id="both">
                            <label class="form-check-label" for="both">Both</label>
                        </div>
                    </div>
                </div>

                <!-- Expected Price -->
                <div class="mb-3">
                    <label class="form-label">Expected Price (USD)</label>
                    <input type="number" class="form-control" placeholder="Enter your expected budget">
                </div>

                <!-- Special Instructions -->
                <div class="mb-3">
                    <label class="form-label">Special Instructions</label>
                    <textarea class="form-control" rows="3" placeholder="eg. Use my lecture notes as a reference"></textarea>
                </div>

                <!-- Confirm Checkbox -->
                <div class="mb-4">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input me-2" type="checkbox" id="confirm">
                        <label class="form-check-label" for="confirm">
                            I confirm this request is for academic help and I understand the solution will be tailored
                            for learning purpose
                        </label>
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit" class="btn-submit">
                        <i class="fa-solid fa-paper-plane"></i> Submit Request
                    </button>
                </div>
            </form>
        </div>
    </section>

    @include('main_footer')

    <script>
        document.getElementById("otherCheck")?.addEventListener("change", function() {
            document.getElementById("otherInput").style.display = this.checked ? "block" : "none";
        });
    </script>
</body>

</html>
