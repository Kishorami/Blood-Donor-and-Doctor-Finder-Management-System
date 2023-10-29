<li class="nav-item">
	<a href="{{ route('blood_requests') }}" class="nav-link">
		<i class="nav-icon fas fa-tint"></i>
		<p>
			Blood Requests
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_contents') }}" class="nav-link">
		<i class="nav-icon fas fa-newspaper"></i>
		<p>
			Contents
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_doctors') }}" class="nav-link">
		<i class="nav-icon fas fa-user-md"></i>
		<p>
			Doctors
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_donors') }}" class="nav-link">
		<i class="nav-icon fas fa-hand-holding-medical"></i>
		<p>
			All Donors
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_search_donors') }}" class="nav-link">
		<i class="nav-icon fas fa-hand-holding-medical"></i>
		<p>
			Search Donors
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('receiver_profile') }}" class="nav-link">
		<i class="nav-icon fas fa-procedures"></i>
		<p>
			Blood Receivers
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_hospitals') }}" class="nav-link">
		<i class="nav-icon fas fa-hospital-alt"></i>
		<p>
			Hospitals
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_contact_us') }}" class="nav-link">
		<i class="nav-icon fas fa-address-book"></i>
		<p>
			Contact Us
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_to_be_proud') }}" class="nav-link">
		<i class="nav-icon fas fa-smile-beam"></i>
		<p>
			রক্ত যোদ্ধা
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_what_people_say') }}" class="nav-link">
		<i class="nav-icon fas fa-smile-beam"></i>
		<p>
			আমরা কৃতজ্ঞ
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_volunteers') }}" class="nav-link">
		<i class="nav-icon fas fa-hands-helping"></i>
		<p>
			Volunteers
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_user_blog') }}" class="nav-link">
		<i class="nav-icon fas fa-clipboard-check"></i>
		<p>
			User Blogs
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_find_solution') }}" class="nav-link">
		<i class="nav-icon fas fa-question"></i>
		<p>
			User Problem
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_site_settings') }}" class="nav-link">
		<i class="nav-icon fas fa-tools"></i>
		<p>
			Settings
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_slider') }}" class="nav-link">
		<i class="nav-icon fas fa-tools"></i>
		<p>
			Sliders Settings
		</p>
	</a>
</li>


{{-- <li class="nav-item">
	<a href="{{ route('emergency_info_settings') }}" class="nav-link">
		<i class="nav-icon fas fa-tools"></i>
		<p>
			Emergency Info Settings
		</p>
	</a>
</li> --}}

<li class="nav-item">
	<a href="#" class="nav-link">
	  <i class="nav-icon fas fa-tools"></i>
	  <p>
	    Emergency Info
	    <i class="fas fa-angle-left right"></i>
	  </p>
	</a>
	<ul class="nav nav-treeview">
		
	    <li class="nav-item">
			<a href="{{ route('ambulance_info_settings') }}" class="nav-link">
				<i class="nav-icon fas fa-ambulance"></i>
				<p>
					Ambulance Info Settings
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('bloodbank_info_settings') }}" class="nav-link">
				<i class="nav-icon fas fa-clinic-medical"></i>
				<p>
					Blood Bank Info Settings
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('funeral_info_settings') }}" class="nav-link">
				<i class="nav-icon fas fa-circle"></i>
				<p>
					Funeral Info Settings
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('graveyard_info_settings') }}" class="nav-link">
				<i class="nav-icon fas fa-circle"></i>
				<p>
					Graveyard Info Settings
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('social_info_settings') }}" class="nav-link">
				<i class="nav-icon fas fa-hands-helping"></i>
				<p>
					Social Organization Info
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('theraphycenter_info_settings') }}" class="nav-link">
				<i class="nav-icon fas fa-hands-helping"></i>
				<p>
					Theraphy Center Info
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('emergencynumber_info_settings') }}" class="nav-link">
				<i class="nav-icon fas fa-phone-alt"></i>
				<p>
					Emergency Number Info
				</p>
			</a>
		</li>
	  
	</ul>
</li>






<li class="nav-item">
	<a href="{{ route('admin_faq') }}" class="nav-link">
		<i class="nav-icon fas fa-question"></i>
		<p>
			FAQ
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('admin_profiles') }}" class="nav-link">
		<i class="nav-icon fas fa-crown"></i>
		<p>
			Admins
		</p>
	</a>
</li>

<li class="nav-item">
	<a href="{{ route('import_donor_excel') }}" class="nav-link">
		<i class="nav-icon fas fa-file-excel"></i>
		<p>
			Donor Import
		</p>
	</a>
</li>
