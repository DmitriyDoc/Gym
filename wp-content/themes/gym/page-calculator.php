<?php
/*
Template Name: Шаблон для страницы CALCULATOR
*/
    get_header();
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo gym_assets_path('img/breadcrumb-bg.jpg'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>BMI calculator</h2>
                        <?php echo get_template_part('includes/tmp/breadcrumbs')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- BMI Calculator Section Begin -->
    <section class="bmi-calculator-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title chart-title">
                        <span>check your body</span>
                        <h2>BMI CALCULATOR CHART</h2>
                    </div>
                    <div class="chart-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Bmi</th>
                                <th>WEIGHT STATUS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="point">Below 18.5</td>
                                <td>Underweight</td>
                            </tr>
                            <tr>
                                <td class="point">18.5 - 24.9</td>
                                <td>Healthy</td>
                            </tr>
                            <tr>
                                <td class="point">25.0 - 29.9</td>
                                <td>Overweight</td>
                            </tr>
                            <tr>
                                <td class="point">30.0 - and Above</td>
                                <td>Obese</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title chart-calculate-title">
                        <span>check your body</span>
                        <h2>CALCULATE YOUR BMI</h2>
                    </div>
                    <div class="chart-calculate-form">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                            viverra maecenas accumsan lacus vel facilisis.</p>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input name="height" type="number" placeholder="Height / cm">
                                </div>
                                <div class="col-sm-6">
                                    <input name="weight" type="number" placeholder="Weight / kg">
                                </div>
                                <div class="col-lg-12">
                                    <button type="button" onclick="calculate();return false">Calculate</button>
                                </div>
                            </div>
                        </form>
                        <p id="output"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BMI Calculator Section End -->


<?php
    get_footer();
?>
