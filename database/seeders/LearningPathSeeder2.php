<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearningPathSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        DB::table('topics')->truncate();
        DB::table('learning_paths')->truncate();

        // Learning Paths and their Topics (Modules)
        $learningPaths = [
            [
                'title' => 'Web Application Security Basics',
                'description' => 'Learn the fundamentals of securing web applications and identifying common vulnerabilities.',
                'is_premium' => false,
                'image' => 'images/paths/web-app-basics.jpg',
                'topics' => [
                    ['title' => 'Introduction to Web Technologies', 'description' => 'Understand HTTP, HTML, and JavaScript basics.', 'order' => 1, 'image' => 'images/topics/web-tech.jpg'],
                    ['title' => 'Common Web Vulnerabilities', 'description' => 'Explore the OWASP Top 10 vulnerabilities.', 'order' => 2, 'image' => 'images/topics/owasp.jpg'],
                    ['title' => 'SQL Injection Fundamentals', 'description' => 'Learn how SQL injection works and how to exploit it.', 'order' => 3, 'image' => 'images/topics/sql-injection.jpg'],
                    ['title' => 'Cross-Site Scripting (XSS) Attacks', 'description' => 'Master XSS attack techniques and prevention.', 'order' => 4, 'image' => 'images/topics/xss.jpg'],
                    ['title' => 'Setting Up a Web Testing Lab', 'description' => 'Configure tools like Burp Suite and OWASP ZAP.', 'order' => 5, 'image' => 'images/topics/web-lab.jpg'],
                ],
            ],
            [
                'title' => 'Advanced Web Exploitation',
                'description' => 'Dive deeper into complex web vulnerabilities and exploitation techniques.',
                'is_premium' => true,
                'image' => 'images/paths/web-exploitation.jpg',
                'topics' => [
                    ['title' => 'Advanced SQL Injection Techniques', 'description' => 'Exploit complex SQL injection scenarios.', 'order' => 1, 'image' => 'images/topics/sql-advanced.jpg'],
                    ['title' => 'Server-Side Request Forgery (SSRF)', 'description' => 'Understand and exploit SSRF vulnerabilities.', 'order' => 2, 'image' => 'images/topics/ssrf.jpg'],
                    ['title' => 'Cross-Site Request Forgery (CSRF)', 'description' => 'Learn CSRF attack methods and defenses.', 'order' => 3, 'image' => 'images/topics/csrf.jpg'],
                    ['title' => 'Session Management and Authentication Flaws', 'description' => 'Exploit session and auth vulnerabilities.', 'order' => 4, 'image' => 'images/topics/session-flaws.jpg'],
                    ['title' => 'Web Shells and File Inclusion Attacks', 'description' => 'Master web shells and file inclusion exploits.', 'order' => 5, 'image' => 'images/topics/web-shells.jpg'],
                ],
            ],
            [
                'title' => 'Web Defense and Secure Coding',
                'description' => 'Learn to secure web applications through best practices and coding techniques.',
                'is_premium' => false,
                'image' => 'images/paths/web-defense.jpg',
                'topics' => [
                    ['title' => 'Secure Coding Principles for Web Apps', 'description' => 'Write secure code to prevent vulnerabilities.', 'order' => 1, 'image' => 'images/topics/secure-coding.jpg'],
                    ['title' => 'Input Validation and Sanitization', 'description' => 'Implement robust input handling.', 'order' => 2, 'image' => 'images/topics/input-validation.jpg'],
                    ['title' => 'Implementing Secure Authentication', 'description' => 'Design secure authentication systems.', 'order' => 3, 'image' => 'images/topics/auth-secure.jpg'],
                    ['title' => 'Web Application Firewalls (WAF) Basics', 'description' => 'Configure and use WAFs effectively.', 'order' => 4, 'image' => 'images/topics/waf.jpg'],
                    ['title' => 'Patching and Hardening Web Servers', 'description' => 'Secure web servers against attacks.', 'order' => 5, 'image' => 'images/topics/server-hardening.jpg'],
                ],
            ],
            [
                'title' => 'Network Fundamentals',
                'description' => 'Master the basics of networking for cybersecurity applications.',
                'is_premium' => false,
                'image' => 'images/paths/network-fundamentals.jpg',
                'topics' => [
                    ['title' => 'Networking Basics', 'description' => 'Learn TCP/IP and OSI model concepts.', 'order' => 1, 'image' => 'images/topics/network-basics.jpg'],
                    ['title' => 'Packet Analysis with Wireshark', 'description' => 'Analyze network traffic using Wireshark.', 'order' => 2, 'image' => 'images/topics/wireshark.jpg'],
                    ['title' => 'Scanning Networks with Nmap', 'description' => 'Use Nmap for network reconnaissance.', 'order' => 3, 'image' => 'images/topics/nmap.jpg'],
                    ['title' => 'Understanding Firewalls and IDS/IPS', 'description' => 'Explore firewall and IDS/IPS systems.', 'order' => 4, 'image' => 'images/topics/firewalls.jpg'],
                    ['title' => 'VPNs and Secure Network Protocols', 'description' => 'Implement secure network communications.', 'order' => 5, 'image' => 'images/topics/vpns.jpg'],
                ],
            ],
            [
                'title' => 'Network Penetration Testing',
                'description' => 'Learn to identify and exploit network vulnerabilities.',
                'is_premium' => true,
                'image' => 'images/paths/network-pentest.jpg',
                'topics' => [
                    ['title' => 'Enumerating Network Services', 'description' => 'Discover and analyze network services.', 'order' => 1, 'image' => 'images/topics/service-enum.jpg'],
                    ['title' => 'Exploiting Common Protocols', 'description' => 'Exploit SMB, FTP, and other protocols.', 'order' => 2, 'image' => 'images/topics/protocol-exploit.jpg'],
                    ['title' => 'Man-in-the-Middle Attacks (MITM)', 'description' => 'Perform MITM attacks ethically.', 'order' => 3, 'image' => 'images/topics/mitm.jpg'],
                    ['title' => 'Password Cracking', 'description' => 'Crack passwords with Hashcat and John.', 'order' => 4, 'image' => 'images/topics/password-crack.jpg'],
                    ['title' => 'Post-Exploitation Techniques', 'description' => 'Maintain access and gather data.', 'order' => 5, 'image' => 'images/topics/post-exploit.jpg'],
                ],
            ],
            [
                'title' => 'Network Defense',
                'description' => 'Secure networks against cyber threats and attacks.',
                'is_premium' => false,
                'image' => 'images/paths/network-defense.jpg',
                'topics' => [
                    ['title' => 'Configuring Secure Firewalls', 'description' => 'Set up firewalls for network security.', 'order' => 1, 'image' => 'images/topics/firewall-config.jpg'],
                    ['title' => 'Intrusion Detection and Prevention Systems', 'description' => 'Implement IDS/IPS solutions.', 'order' => 2, 'image' => 'images/topics/ids-ips.jpg'],
                    ['title' => 'Network Segmentation Strategies', 'description' => 'Design segmented network architectures.', 'order' => 3, 'image' => 'images/topics/segmentation.jpg'],
                    ['title' => 'Log Analysis for Threat Detection', 'description' => 'Analyze logs to identify threats.', 'order' => 4, 'image' => 'images/topics/log-analysis.jpg'],
                    ['title' => 'Incident Response for Network Breaches', 'description' => 'Respond to network security incidents.', 'order' => 5, 'image' => 'images/topics/incident-response.jpg'],
                ],
            ],
            [
                'title' => 'OSINT Fundamentals',
                'description' => 'Learn the basics of open-source intelligence gathering.',
                'is_premium' => false,
                'image' => 'images/paths/osint-fundamentals.jpg',
                'topics' => [
                    ['title' => 'Introduction to OSINT', 'description' => 'Understand OSINT and its legal aspects.', 'order' => 1, 'image' => 'images/topics/osint-intro.jpg'],
                    ['title' => 'Using Search Engines for Intelligence', 'description' => 'Leverage Google for OSINT.', 'order' => 2, 'image' => 'images/topics/search-engines.jpg'],
                    ['title' => 'Social Media Reconnaissance', 'description' => 'Gather intel from social platforms.', 'order' => 3, 'image' => 'images/topics/social-recon.jpg'],
                    ['title' => 'Public Records and Database Access', 'description' => 'Access public records legally.', 'order' => 4, 'image' => 'images/topics/public-records.jpg'],
                    ['title' => 'Tools for OSINT', 'description' => 'Use Maltego and SpiderFoot for OSINT.', 'order' => 5, 'image' => 'images/topics/osint-tools.jpg'],
                ],
            ],
            [
                'title' => 'Advanced OSINT Techniques',
                'description' => 'Master advanced methods for OSINT investigations.',
                'is_premium' => true,
                'image' => 'images/paths/osint-advanced.jpg',
                'topics' => [
                    ['title' => 'Geolocation and Image Analysis', 'description' => 'Analyze images for location data.', 'order' => 1, 'image' => 'images/topics/geolocation.jpg'],
                    ['title' => 'Dark Web and Deep Web Research', 'description' => 'Explore hidden web resources.', 'order' => 2, 'image' => 'images/topics/dark-web.jpg'],
                    ['title' => 'Automating OSINT with Python', 'description' => 'Write scripts to automate OSINT.', 'order' => 3, 'image' => 'images/topics/osint-python.jpg'],
                    ['title' => 'Cross-Referencing Data for Profiling', 'description' => 'Build profiles from OSINT data.', 'order' => 4, 'image' => 'images/topics/data-profiling.jpg'],
                    ['title' => 'OSINT for Threat Intelligence', 'description' => 'Use OSINT for threat analysis.', 'order' => 5, 'image' => 'images/topics/threat-intel.jpg'],
                ],
            ],
            [
                'title' => 'OSINT Defense',
                'description' => 'Protect yourself and others from OSINT exposure.',
                'is_premium' => false,
                'image' => 'images/paths/osint-defense.jpg',
                'topics' => [
                    ['title' => 'Protecting Personal Data Online', 'description' => 'Minimize your digital footprint.', 'order' => 1, 'image' => 'images/topics/data-protection.jpg'],
                    ['title' => 'Identifying OSINT Exposure', 'description' => 'Find and fix data leaks.', 'order' => 2, 'image' => 'images/topics/exposure-check.jpg'],
                    ['title' => 'Privacy Tools', 'description' => 'Use TOR, VPNs, and proxies effectively.', 'order' => 3, 'image' => 'images/topics/privacy-tools.jpg'],
                    ['title' => 'Corporate OSINT Risk Assessment', 'description' => 'Assess business OSINT risks.', 'order' => 4, 'image' => 'images/topics/corporate-osint.jpg'],
                    ['title' => 'Creating Fake Personas for Testing', 'description' => 'Build personas for OSINT tests.', 'order' => 5, 'image' => 'images/topics/fake-personas.jpg'],
                ],
            ],
            [
                'title' => 'System Penetration Testing',
                'description' => 'Learn to hack and secure operating systems.',
                'is_premium' => true,
                'image' => 'images/paths/system-pentest.jpg',
                'topics' => [
                    ['title' => 'Linux System Enumeration', 'description' => 'Discover Linux system details.', 'order' => 1, 'image' => 'images/topics/linux-enum.jpg'],
                    ['title' => 'Windows System Enumeration', 'description' => 'Gather Windows system info.', 'order' => 2, 'image' => 'images/topics/windows-enum.jpg'],
                    ['title' => 'Privilege Escalation Techniques', 'description' => 'Escalate system privileges.', 'order' => 3, 'image' => 'images/topics/priv-esc.jpg'],
                    ['title' => 'Exploiting Misconfigurations', 'description' => 'Exploit system misconfigs.', 'order' => 4, 'image' => 'images/topics/misconfigs.jpg'],
                    ['title' => 'Backdoors and Persistence', 'description' => 'Maintain system access.', 'order' => 5, 'image' => 'images/topics/backdoors.jpg'],
                ],
            ],
            [
                'title' => 'Malware and Reverse Engineering',
                'description' => 'Analyze and understand malicious software.',
                'is_premium' => true,
                'image' => 'images/paths/malware-re.jpg',
                'topics' => [
                    ['title' => 'Introduction to Malware Types', 'description' => 'Learn about malware varieties.', 'order' => 1, 'image' => 'images/topics/malware-types.jpg'],
                    ['title' => 'Analyzing Malware with Static Tools', 'description' => 'Perform static malware analysis.', 'order' => 2, 'image' => 'images/topics/static-analysis.jpg'],
                    ['title' => 'Dynamic Analysis in Sandboxes', 'description' => 'Analyze malware dynamically.', 'order' => 3, 'image' => 'images/topics/dynamic-analysis.jpg'],
                    ['title' => 'Reverse Engineering Basics', 'description' => 'Use IDA and Ghidra for RE.', 'order' => 4, 'image' => 'images/topics/reverse-eng.jpg'],
                    ['title' => 'Writing Basic Exploits', 'description' => 'Develop simple exploits.', 'order' => 5, 'image' => 'images/topics/exploit-writing.jpg'],
                ],
            ],
            [
                'title' => 'System Hardening',
                'description' => 'Secure systems against attacks and breaches.',
                'is_premium' => false,
                'image' => 'images/paths/system-hardening.jpg',
                'topics' => [
                    ['title' => 'Securing Linux Systems', 'description' => 'Harden Linux against attacks.', 'order' => 1, 'image' => 'images/topics/linux-hardening.jpg'],
                    ['title' => 'Securing Windows Systems', 'description' => 'Protect Windows environments.', 'order' => 2, 'image' => 'images/topics/windows-hardening.jpg'],
                    ['title' => 'Patch Management Strategies', 'description' => 'Implement effective patching.', 'order' => 3, 'image' => 'images/topics/patch-mgmt.jpg'],
                    ['title' => 'Endpoint Protection Tools', 'description' => 'Use endpoint security tools.', 'order' => 4, 'image' => 'images/topics/endpoint-protect.jpg'],
                    ['title' => 'Auditing and Compliance Checks', 'description' => 'Perform system audits.', 'order' => 5, 'image' => 'images/topics/compliance.jpg'],
                ],
            ],
            [
                'title' => 'Social Engineering Basics',
                'description' => 'Understand and execute social engineering techniques.',
                'is_premium' => false,
                'image' => 'images/paths/social-eng-basics.jpg',
                'topics' => [
                    ['title' => 'Psychology of Social Engineering', 'description' => 'Learn social eng principles.', 'order' => 1, 'image' => 'images/topics/psychology.jpg'],
                    ['title' => 'Phishing Techniques and Tools', 'description' => 'Craft phishing campaigns.', 'order' => 2, 'image' => 'images/topics/phishing.jpg'],
                    ['title' => 'Pretexting and Impersonation', 'description' => 'Master pretexting techniques.', 'order' => 3, 'image' => 'images/topics/pretexting.jpg'],
                    ['title' => 'Physical Security Breaches', 'description' => 'Exploit physical security flaws.', 'order' => 4, 'image' => 'images/topics/physical-breach.jpg'],
                    ['title' => 'Social Engineering Frameworks', 'description' => 'Use SET for social eng.', 'order' => 5, 'image' => 'images/topics/set-framework.jpg'],
                ],
            ],
            [
                'title' => 'Defending Against Social Engineering',
                'description' => 'Protect against social engineering attacks.',
                'is_premium' => false,
                'image' => 'images/paths/social-eng-defense.jpg',
                'topics' => [
                    ['title' => 'Recognizing Phishing Attempts', 'description' => 'Identify phishing emails.', 'order' => 1, 'image' => 'images/topics/phishing-detect.jpg'],
                    ['title' => 'Employee Awareness Training', 'description' => 'Train staff on social eng.', 'order' => 2, 'image' => 'images/topics/awareness-train.jpg'],
                    ['title' => 'Email Security Configurations', 'description' => 'Secure email systems.', 'order' => 3, 'image' => 'images/topics/email-security.jpg'],
                    ['title' => 'Multi-Factor Authentication (MFA)', 'description' => 'Implement MFA effectively.', 'order' => 4, 'image' => 'images/topics/mfa.jpg'],
                    ['title' => 'Incident Response for Social Attacks', 'description' => 'Respond to social eng breaches.', 'order' => 5, 'image' => 'images/topics/social-incident.jpg'],
                ],
            ],
            [
                'title' => 'CTF Challenges',
                'description' => 'Master Capture The Flag challenges for hacking skills.',
                'is_premium' => true,
                'image' => 'images/paths/ctf-challenges.jpg',
                'topics' => [
                    ['title' => 'Introduction to CTF Competitions', 'description' => 'Learn CTF basics and formats.', 'order' => 1, 'image' => 'images/topics/ctf-intro.jpg'],
                    ['title' => 'Web-Based CTF Challenges', 'description' => 'Solve web-based CTF tasks.', 'order' => 2, 'image' => 'images/topics/web-ctf.jpg'],
                    ['title' => 'Network-Based CTF Challenges', 'description' => 'Tackle network CTF problems.', 'order' => 3, 'image' => 'images/topics/network-ctf.jpg'],
                    ['title' => 'Binary Exploitation Challenges', 'description' => 'Exploit binary vulnerabilities.', 'order' => 4, 'image' => 'images/topics/binary-ctf.jpg'],
                    ['title' => 'Cryptography Challenges', 'description' => 'Crack crypto CTF puzzles.', 'order' => 5, 'image' => 'images/topics/crypto-ctf.jpg'],
                ],
            ],
            [
                'title' => 'Virtual Labs',
                'description' => 'Practice hacking in safe, virtual environments.',
                'is_premium' => true,
                'image' => 'images/paths/virtual-labs.jpg',
                'topics' => [
                    ['title' => 'Setting Up a Personal Hacking Lab', 'description' => 'Build your own hacking lab.', 'order' => 1, 'image' => 'images/topics/hacking-lab.jpg'],
                    ['title' => 'Simulating Web Attacks', 'description' => 'Practice web attack scenarios.', 'order' => 2, 'image' => 'images/topics/web-attack-lab.jpg'],
                    ['title' => 'Simulating Network Attacks', 'description' => 'Simulate network attacks.', 'order' => 3, 'image' => 'images/topics/network-attack-lab.jpg'],
                    ['title' => 'Simulating System Compromises', 'description' => 'Practice system hacks.', 'order' => 4, 'image' => 'images/topics/system-attack-lab.jpg'],
                    ['title' => 'Real-World Scenario Labs', 'description' => 'Tackle realistic scenarios.', 'order' => 5, 'image' => 'images/topics/real-world-lab.jpg'],
                ],
            ],
            [
                'title' => 'Cybersecurity Career Prep',
                'description' => 'Prepare for a career in cybersecurity.',
                'is_premium' => false,
                'image' => 'images/paths/career-prep.jpg',
                'topics' => [
                    ['title' => 'Overview of Cybersecurity Roles', 'description' => 'Explore cybersecurity careers.', 'order' => 1, 'image' => 'images/topics/cyber-roles.jpg'],
                    ['title' => 'Building a Cybersecurity Portfolio', 'description' => 'Create a professional portfolio.', 'order' => 2, 'image' => 'images/topics/portfolio.jpg'],
                    ['title' => 'Resume and Interview Tips', 'description' => 'Ace cybersecurity interviews.', 'order' => 3, 'image' => 'images/topics/resume-tips.jpg'],
                    ['title' => 'Networking in the Cybersecurity Community', 'description' => 'Build industry connections.', 'order' => 4, 'image' => 'images/topics/networking.jpg'],
                    ['title' => 'Freelancing as a Penetration Tester', 'description' => 'Start freelancing in pentesting.', 'order' => 5, 'image' => 'images/topics/freelance-pentest.jpg'],
                ],
            ],
            [
                'title' => 'Certification Prep',
                'description' => 'Prepare for top cybersecurity certifications.',
                'is_premium' => true,
                'image' => 'images/paths/cert-prep.jpg',
                'topics' => [
                    ['title' => 'CompTIA Security+ Prep', 'description' => 'Study for Security+ certification.', 'order' => 1, 'image' => 'images/topics/security-plus.jpg'],
                    ['title' => 'CEH (Certified Ethical Hacker) Prep', 'description' => 'Prepare for CEH certification.', 'order' => 2, 'image' => 'images/topics/ceh.jpg'],
                    ['title' => 'OSCP (Offensive Security Certified Professional) Prep', 'description' => 'Tackle OSCP certification.', 'order' => 3, 'image' => 'images/topics/oscp.jpg'],
                    ['title' => 'CISSP Basics', 'description' => 'Learn CISSP fundamentals.', 'order' => 4, 'image' => 'images/topics/cissp.jpg'],
                    ['title' => 'Practice Exams and Study Strategies', 'description' => 'Master exam techniques.', 'order' => 5, 'image' => 'images/topics/practice-exams.jpg'],
                ],
            ],
        ];

        // Insert Learning Paths and Topics
        foreach ($learningPaths as $path) {
            $pathId = DB::table('learning_paths')->insertGetId([
                'title' => $path['title'],
                'description' => $path['description'],
                'is_premium' => $path['is_premium'],
                'image' => $path['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($path['topics'] as $topic) {
                DB::table('topics')->insert([
                    'path_id' => $pathId,
                    'title' => $topic['title'],
                    'description' => $topic['description'],
                    'resources' => null, // Placeholder, can be updated later
                    'order' => $topic['order'],
                    'image' => $topic['image'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}