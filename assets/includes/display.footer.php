 <!-- Footer Section -->
 <div class="footer">
                <p><strong><?= htmlspecialchars($clinicConfig['name']) ?></strong><br>
                    <strong>Address:</strong> <?= htmlspecialchars($clinicConfig['address']) ?><Br>
                    <strong>Principal Vet:</strong> <?= htmlspecialchars($clinicConfig['principal_vet']) ?><br>
                    <strong>Principal Nurse:</strong> <?= htmlspecialchars($clinicConfig['principal_nurse']) ?><br>
                    <strong>Phone:</strong> <?= htmlspecialchars($clinicConfig['contact_details']['phone']) ?><br>
                    <strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($clinicConfig['contact_details']['email']) ?>">
                        <?= htmlspecialchars($clinicConfig['contact_details']['email']) ?></a>
                </p>

                <small>Copywrite &copy; <?= htmlspecialchars($clinicConfig['year_opened']) ?> - <?php echo date("Y"); ?>, <?= htmlspecialchars($parentCompany['name']) ?>, Trading as <?= htmlspecialchars($clinicConfig['name']) ?>; All Rights Reserved</small>
                <small><a href="?logout">logout</a></small>
            </div>